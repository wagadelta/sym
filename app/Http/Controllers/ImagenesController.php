<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateImagenesRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ImagenesRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Intervention\Image\Facades\Image;
use App\Models\Imagenes;
use App\Models\Corredores;
use App\Models\Carreras;
use DB;
use Input;
use Carbon\Carbon;
use Session;
use Cache;

class ImagenesController extends AppBaseController
{

	/** @var  ImagenesRepository */
	private $imagenesRepository;

	function __construct(ImagenesRepository $imagenesRepo)
	{
		$this->imagenesRepository = $imagenesRepo;
	}

	/**
	* Display a listing of the Imagenes.
	*
	* @param Request $request
	*
	* @return Response
	*/
	public function index(Request $request)
	{
		$input = $request->all();

		$imagenes = \DB::table('imagenes')
		->where('tipo_imagen', '=', 'normal')
		->orderBy('id_ubicacion', 'desc')
		->paginate(50);
		$imagenes->setPath($request->url());
		//dd($imagenes->render());
		return view('imagenes.index')
		->with('imagenes', $imagenes);
	}

	/**
	* Show the form for creating a new Imagenes.
	*
	* @return Response
	*/
	public function create()
	{
		return view('imagenes.create');
	}

	/**
	* Store a newly created Imagenes in storage.
	*
	* @param CreateImagenesRequest $request
	*
	* @return Response
	*/
	public function store(CreateImagenesRequest $request)
	{
		$input = $request->all();

		$imagenes = $this->imagenesRepository->store($input);

		Flash::message('Imagenes saved successfully.');

		return redirect(route('imagenes.index'));
	}

	/**
	* Display the specified Imagenes.
	*
	* @param  int $id
	*
	* @return Response
	*/
	public function show($id)
	{
		$imagenes = $this->imagenesRepository->findImagenesById($id);

		if(empty($imagenes))
		{
			Flash::error('Imagenes not found');
			return redirect(route('imagenes.index'));
		}

		return view('imagenes.show')->with('imagenes', $imagenes);
	}

	/**
	* Show the form for editing the specified Imagenes.
	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($id)
	{
		$imagenes = $this->imagenesRepository->findImagenesById($id);

		if(empty($imagenes))
		{
			Flash::error('Imagenes not found');
			return redirect(route('imagenes.index'));
		}

		return view('imagenes.edit')->with('imagenes', $imagenes);
	}

	/**
	* Update the specified Imagenes in storage.
	*
	* @param  int    $id
	* @param CreateImagenesRequest $request
	*
	* @return Response
	*/
	public function update($id, CreateImagenesRequest $request)
	{
		$imagenes = $this->imagenesRepository->findImagenesById($id);

		if(empty($imagenes))
		{
			Flash::error('Imagenes not found');
			return redirect(route('imagenes.index'));
		}

		$imagenes = $this->imagenesRepository->update($imagenes, $request->all());

		Flash::message('Imagenes updated successfully.');

		return redirect(route('imagenes.index'));
	}

	/**
	* Remove the specified Imagenes from storage.
	*
	* @param  int $id
	*
	* @return Response
	*/
	public function destroy($id)
	{
		$imagenes = $this->imagenesRepository->findImagenesById($id);

		if(empty($imagenes))
		{
			Flash::error('Imagenes not found');
			return redirect(route('imagenes.index'));
		}

		$imagenes->delete();

		Flash::message('Imagenes deleted successfully.');

		return redirect(route('imagenes.index'));
	}

	/* Method on route /image-upload. Resize, watermark, and insert in DB all images uploaded */
	public function upload(Request $request)
	{
		// PHP CON FIG
		ini_set('post_max_size', '128M');
		ini_set('upload_max_filesize', '128M');
		// GENERAL DATA
		$fotografoId = $request->input('id_fotografo');
		$ubicacionId = $request->input('ubicacion');
		$now = Carbon::now()->toDateTimeString();
		$fileTempName   = str_slug($now, '_');
		$imagePath = '/fotos/uploads/';
		$outputDir = base_path().$imagePath.'temp/';
		$img =  Image::make($_FILES['file']['tmp_name'][0]);
		$watermark = Image::make(base_path().'/fotos/images/sym-watermark.png');
		$dataArray=array('id_fotografo' => $fotografoId, 'path' => $imagePath, 'slug' => '',
		'archivo' => '', 'id_ubicacion' => $ubicacionId, 'estado' => '1');

		// FULL image
		$img->resize(1024, 768)->insert($watermark, 'bottom-right');
		$imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-'.$fileTempName.'-full.jpg';
		$pathToSave    = base_path() .$imagePath. $imageName;
		$img->save($pathToSave);
		$dataArray['archivo']=$imageName;
		$this->addImageOnTable($dataArray, 'full');

		// NORMAL  image
		$img = Image::make($pathToSave);
		$imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-'.$fileTempName.'-normal.jpg';
		$pathToSave    = base_path() .$imagePath. $imageName;
		$img->resize(790, 593)->save($pathToSave);
		$dataArray['archivo']=$imageName;
		$this->addImageOnTable($dataArray, 'normal');

		// THUMB  image
		$img = Image::make($pathToSave);
		$imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-'.$fileTempName.'-thumb.jpg';
		$pathToSave    = base_path() .$imagePath. $imageName;
		$img->resize(150, 113)->save($pathToSave);
		$dataArray['archivo']=$imageName;
		$this->addImageOnTable($dataArray, 'thumb');

	}

	private function addImageOnTable($data,$tipo_imagen){
		$slugArchivo = str_slug($data['archivo'],'-');
		$imagen =
		[
			'id_fotografo'      => $data['id_fotografo'],
			'id_etiquetador'    => '',
			'path'              => $data['path'],
			'archivo'           => $data['archivo'],
			'slug'              => $slugArchivo,
			'tipo_imagen'       => $tipo_imagen,
			'etiquetas'         => '',
			'id_ubicacion'      => $data['id_ubicacion'],
			'estado'            => $data['estado']
		];
		DB::table('imagenes')->insert($imagen);
	}

	public function getCarrera(Request $request)
	{
		$input = $request->all();
		if (\Auth::user()->id_rol == 2 )
		{  // if is Etiquetador ROL
			// mostrar la siguiente imagen sin etiquetar o nueva
			$carreras = Carreras::get();
			return view('etiquetador.show-carreras')
			->with('carreras', $carreras);

		} // if auth

	}

	public function etiquetar($carreraId, Request $request)
	{
		$userId = \Auth::user()->id;
		//dd($carreraId);
		DB::enableQueryLog();
		Cache::forget('imagenes');
		$imagen = DB::table('imagenes')
		->select('imagenes.id', 'imagenes.etiquetas')
		->join('ubicaciones', 'imagenes.id_ubicacion', '=', 'ubicaciones.id')
		->join('carreras', 'ubicaciones.id_carrera', '=', 'carreras.id')
		->where ('carreras.id', '=', $carreraId)
		->where ('imagenes.tipo_imagen', '=', 'normal')
		->where ('imagenes.is_blocked', '=', '0')
		->where('id_etiquetador', '=', 0)
		->first();
		//dd(array($imagen, DB::getQueryLog() ));
		if(!$imagen) {
			return view('etiquetador.show-image-no-results');
		}
		//Imagenes::where-> first();

		// blockImagenToEtiquetar() //BLOQUEAR IMAGEN
		$imagenBlock = Imagenes::find($imagen->id); //select the book using primary id
		$imagenBlock->is_blocked = '1';
		$saved = $imagenBlock->save();

		if(!$saved){
			App::abort(500, 'Error NO GRABO');
		}else{
			//dd(array($imagenBlock,$imagen->id,'saved ok',DB::getQueryLog()));
		}

		$etiquetasArray  = array_filter(explode('|', $imagen->etiquetas) );
		$etiquetasString = implode(", ", $etiquetasArray);
		//dd(\Auth::user()->id);

		return view('etiquetador.show-image')
		->with('image', $imagenBlock)
		->with('etiquetasString', $etiquetasString)
		->with('etiquetadorId', $userId)
		->with('carreraId', $carreraId);
	}

	public function updateEtiquetar($id, Request $request){
		$input = $request->all();
			// formatear comas -> pipe
		$etiquetas_coma = str_replace(' ','',$input['etiquetas']);
		$etiquetas_pipe = '|'.str_replace(',','|',$etiquetas_coma).'|';
		$etiquetas_pipe = str_replace('',' ', $etiquetas_pipe);
		//dd(array($id,$input,$etiquetas_pipe, $etiquetas_coma));
		$imagen = Imagenes::find($id); //select the image using primary id
		$imagenOrigen = $imagen;
		$imagen->etiquetas = $etiquetas_pipe;
		$imagen->id_etiquetador = $input['etiquetadorId'];
		$imagen->is_blocked = '0';

		$saved = $imagen->save();
		if(!$saved){
			App::abort(500, 'Error NO GRABO');
		}else{
			// change string to array
			$explode = explode(',', $etiquetas_coma);
			//dd($explode);
			foreach ($explode as $key){
				$corredor = Corredores::where('bib_number', '=', $key)
										->where('id_carrera','=', $input['carreraId'])
										->first();
				$corredor->etiqueta_count = $corredor->etiqueta_count+1;
				//dd($corredor);
				$corredor->save();
			}
		}

		return redirect('/imagenes/etiquetar/carrera/'.$input['carreraId'].'?');
		//return redirect('/imagenes/etiquetar');

	}

	public function uploadImages(){
		$carreras = Carreras::get();
		//dd($carreras);
		return view('fotografo.index')
		->with('carreras', $carreras);

	}

	public function searchById($id = null, $id_run, Request $request1)
	{
		//DB::connection()->enableQueryLog();
		$imagenes= Imagenes::where('etiquetas', 'LIKE', "%|$id|%")
		->where('tipo_imagen', 'normal')
		->where('etiquetas', '<>', '')
		->where('etiquetas', '<>', '||')
		->paginate(12);
		//		dd(DB::getQueryLog($imagenes));

		$corredor= Corredores::where('bib_number', '=' ,$id)
		->where('id_carrera', '=', $id_run)
		->first();
	//dd($corredor);
		//$NombreCorredor = $imagenes->corredor()->name; // TODO: DEBE DE SETEAR LOS RELATIONSHIPS.
		return view('resultados.byname')
		->with('images', $imagenes)
		->with('corredorData', $corredor);
		//->with('corredorName', $NombreCorredor)   // TODO
	}




}
