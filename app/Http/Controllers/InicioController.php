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

	
	public function index()
	{
		$runners = Imagenes::ImgLastRunner();
		$imagenes = Imagenes::ImgSlideShow();
		//return $imagenes;
		return view('inicio', compact('runners', 'imagenes'));
		
	}
	
	public function locationRunner($id)
	{
		
		$locationRun = Imagenes::ImgUbicaciones($id);
		return view('ubicaciones', compact('locationRun'));
		
	}
	
	public function runnerImgs($id)
	{
		$images = Imagenes::ImgRunners($id);
		//return $images;
		return view('imagesxlocate',compact('images'));
	}
	
	
}
