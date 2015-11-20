<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateImagenesRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ImagenesRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Intervention\Image\Facades\Image;
use App\Models\Carreras;
use App\Models\Imagenes;
use DB;

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

		$imagenes = \DB::table('imagenes')->paginate(50);
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
	
	public function upload(Request $request)
	{
		$input = $request->all();
		
		
		// full image
		$fotografoId = 9; //$input->id_fotografo();  TODO: RECUPERAR VALOR DEL INPUT DEL FORM
		$ubicacionId = 2; //$input->ubicacion();	TODO: RECUPERAR VALOR DEL INPUT DEL FORM
		$imagePath = '/public/uploads/';
		
		$watermark = Image::make(base_path().'/storage/images/sym-watermark.png');
		$img 	 	= Image::make($_FILES['file']['tmp_name']);  // TODO: FOR EACH $FILE{}FILE
		
		// dd($_FILES);
		// $files = $_FILES['file']['tmp_name'];
		// $count = 0;
		// //foreach ($files as $file) {
		
		$img->resize(1024, 768)->insert($watermark, 'bottom-right');
		//$fileName = "800x600_".$_FILES['file']['name'];
		$imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-full.jpg';
		$pathToSave    = base_path() .$imagePath. $imageName;
		$img->save($pathToSave);
		
		$imagen =
	      [
	      'id_fotografo'      => $fotografoId,
	      'id_etiquetador'    => '',
	      'path'              => 'public/uploads/',
	      'archivo'           => $imageName,
	      'slug'              => $imageName,
	      'tipo_imagen'       => 'full', //$faker->randomElement($array = array ('full','normal','thumb')),
	      'etiquetas'         => '',
	      //'fecha_etiqueta'    => $faker->dateTimeThisYear($max='now'),
	      'id_ubicacion'      => $ubicacionId,
	      'estado'            => '1'
	      ];
	      DB::table('imagenes')->insert($imagen);
	      
	     // NORMAL  image
	      $img = Image::make($pathToSave);
	      $imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-normal.jpg';
	      $pathToSave    = base_path() .$imagePath. $imageName;
	      $img->resize(452, 340)->save($pathToSave);
	      
	      	$imagen =
	      [
	      'id_fotografo'      => $fotografoId,
	      'id_etiquetador'    => '',
	      'path'              => 'public/uploads/',
	      'archivo'           => $imageName,
	      'slug'              => $imageName,
	      'tipo_imagen'       => 'normal', //$faker->randomElement($array = array ('full','normal','thumb')),
	      'etiquetas'         => '',
	      //'fecha_etiqueta'    => $faker->dateTimeThisYear($max='now'),
	      'id_ubicacion'      => $ubicacionId,
	      'estado'            => '1'
	      ];
	      DB::table('imagenes')->insert($imagen);
	      
	      // THUMB  image
	      $img = Image::make($pathToSave);
	      $imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-thumb.jpg';
	      $pathToSave    = base_path() .$imagePath. $imageName;
	      $img->resize(150, 100)->save($pathToSave);
    	$imagen =
	      [
	      'id_fotografo'      => $fotografoId,
	      'id_etiquetador'    => '',
	      'path'              => 'public/uploads/',
	      'archivo'           => $imageName,
	      'slug'              => $imageName,
	      'tipo_imagen'       => 'thumb', //$faker->randomElement($array = array ('full','normal','thumb')),
	      'etiquetas'         => '',
	      //'fecha_etiqueta'    => $faker->dateTimeThisYear($max='now'),
	      'id_ubicacion'      => $ubicacionId,
	      'estado'            => '1'
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
		$imagen = Imagenes::first();
	 //dd($imagen);
		return view('etiquetador.show-image')
				->with('image', $imagen);
	}

	public function uploadImages(){
		$carreras = Carreras::get();
		//dd($carreras);
		return view('fotografo.index')
			->with('carreras', $carreras);
		
	}

}

