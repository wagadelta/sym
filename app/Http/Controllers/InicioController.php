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
	
	// Muestra todas las ubicaciones de la carrera
	public function locationRunner($id)
	{
		
		$allImgsRun = Imagenes::ImgsRunners($id);
		$runner = Imagenes:: nameRunner($id);
		$idRunner = Imagenes:: idRunner($id);
		//dd($allImgsRun);
		return view('corredoresxcarrera')
				->with('allImgsRun', $allImgsRun)
				->with('name', $runner)
				->with('id', $idRunner);
				
		
	}
	
	// Muestra todas las imagenes que pertenecen a una ubicación
	public function runnerImgs($id)
	{
		$images = Imagenes::ImgRunners($id);
		return view('imagesxlocate',compact('images'));
	}
	
	
	public static function searchByTag($corParam_1 = null, $runParam_2 = null, Request $request)
	{
		DB::enableQueryLog();
		$allImgsRun = DB::table('imagenes as i')
			->join('ubicaciones as u', 'i.id_ubicacion', '=', 'u.id')
			->select('i.id', 'i.archivo', 'i.id_ubicacion', 'i.etiquetas', 'u.id_carrera')
			->where('i.tipo_imagen', '=', '\'full\'')
			//->where("i.etiquetas LIKE '%|?|%' OR i.etiquetas LIKE '%?|%'",array($runParam_2,$runParam_2))
			->where('i.etiquetas', 'like', "%|$runParam_2|%")
			//->orWhere('i.etiquetas', 'like', "%$runParam_2|%")
			->where('u.id_carrera', '=', $corParam_1)
			->get();
		$name = Imagenes::nameRunner($corParam_1);
		$id = Imagenes::idRunner($corParam_1);
	//	dd(DB::getQueryLog());
			
		return  view('corredoresxcarrera')
					->with('allImgsRun',$allImgsRun)
					->with('id', $id)
					->with('name', $name);
		
	}
	
	
}
