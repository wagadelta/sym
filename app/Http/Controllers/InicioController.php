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

	private $imagenesRepository;
	
	function __construct(ImagenesRepository $imagenesRepo)
	{
		$this->imagenesRepository = $imagenesRepo;
		$this->middleware('guest');
	}
	
	/*
	public function __construct()
	{
		$this->middleware('guest');
	}*/

	
	public function index()
	{
		$images = Imagenes::ImgNormal();
		//return $images;
		return view('inicio', compact('images'));
		
	}
	
	
}
