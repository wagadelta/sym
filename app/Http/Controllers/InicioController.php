<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Repositories\ImagenesRepository;
use Response;
use Flash;
use Intervention\Image\Facades\Image;
use App\Models\Imagenes;

use Illuminate\Http\Request;

class InicioController extends Controller {

	//private $imagenesRepository;
	
	/*
	public function __construct()
	{
		$this->middleware('guest');
	}*/

	# Muestra las ultimas carreras
	public function index()
	{
		$runners = Imagenes::ImgLastRunner();
		$imagenes = Imagenes::ImgSlideShow();
		//return $runners;
		return view('inicio', compact('runners', 'imagenes'));
		
	}
	
	// Muestra todas las ubicaciones de la carrera
	public function locationRunner($id)
	{
		
		$allImgsRun = Imagenes::ImgsRunners($id);
		$runner = Imagenes:: nameRunner($id);
		//dd($runner);
		return view('ubicaciones')
				->with('allImgsRun', $allImgsRun)
				->with('name', $runner);
		
	}
	
	// Muestra todas las imagenes que pertenecen a una ubicación
	public function runnerImgs($id)
	{
		$images = Imagenes::ImgRunners($id);
		return view('imagesxlocate',compact('images'));
	}
	

	
	
}
