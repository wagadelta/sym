<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Repositories\ImagenesRepository;
use Response;
use Flash;
use Intervention\Image\Facades\Image;
use App\Models\Imagenes;
use DB;
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
	//dd(public_path('something'));
	return view('inicio', compact('runners', 'imagenes'));

}

// Muestra todas los corredores de una carrera con paginacion
public function locationRunner($id, Request $requests)
{
	//dd($requests);
	$allImgsRun = Imagenes::ImgsRunners($id, $requests);
	$Namerunner = Imagenes:: nameRunner($id);
	$descRunner = Imagenes:: descriptRunner($id);
	$idRunner = Imagenes:: idRunner($id);
	//dd($allImgsRun);
	return view('corredoresxcarrera')
	->with('allImgsRun', $allImgsRun)
	->with('name', $Namerunner)
	->with('descript', $descRunner)
	->with('id', $idRunner);

}

// Muestra todas las imagenes que pertenecen a una ubicación
public function runnerImgs($id)
{
	$images = Imagenes::ImgRunners($id);
	return view('imagesxlocate',compact('images'));
}


public static function searchByTag($idRace, $qry, Request $request)
{


	if(ctype_digit($qry))
	{
		//	dd($runParam_2);

		$allImgsRun = Imagenes::searchTagCorrId($idRace, $qry, $request);
		//dd($result);
		$name = Imagenes::nameRunner($idRace);
		$id = Imagenes::idRunner($idRace);
		//dd($id);

		return  view('imgs_x_corr_carr')
		->with('allImgsRun',$allImgsRun)
		->with('id', $id)
		->with('name', $name);
	}else
	{
		//	dd($runParam_2);

		$allImgsRun = Imagenes::searchTagCorrByName($idRace, $qry, $request);
		//dd($allImgsRun);
		$nameRace = Imagenes::nameRunner($idRace);
		$id = Imagenes::idRunner($idRace);
		//dd($id);

		//dd($allImgsRun);

		return  view('resultados.results-tagin')
		->with('allImgsRun',$allImgsRun)
		->with('qry', $qry)
		->with('name', $nameRace);
	}

}

}
