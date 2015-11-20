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
		
	$watermark = Image::make(base_path().'/storage/images/logot.png');
	$img 	 	= Image::make($_FILES['file']['tmp_name']);
	
	$img->resize(800, 600)->insert($watermark, 'bottom-right');
	$fileName = "800x600_".$_FILES['file']['name'];
	$img->save( base_path().'/storage/images/'.$fileName);
	
	$img->resize(300, 200)->insert($watermark, 'bottom-right');
	$fileName = "300x200_".$_FILES['file']['name'];
	$img->save( base_path().'/storage/images/'.$fileName);

	$img->resize(75, 75)->insert($watermark, 'bottom-right');
	$fileName = "75x75_".$_FILES['file']['name'];
	$img->save( base_path().'/storage/images/'.$fileName);


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
		return view('fotografo.index');
		
	}

}

