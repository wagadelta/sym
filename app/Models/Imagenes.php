<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\Requests;

class Imagenes extends Model
{
    
	public $table = "imagenes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "id_fotografo",
		"id_etiquetador",
		"path",
		"archivo",
		"slug",
		"tipo_imagen",
		"etiquetas",
		"fecha_etiqueta",
		"id_ubicacion",
		"estado", 
		"created_at",
		"updated_at"
	];

	public static $rules = [
	    "id_fotografo" => "required",
		"id_etiquetador" => "required",
		"path" => "required",
		"archivo" => "required",
		"slug" => "required",
		"tipo_imagen" => "required"
	];
	
	
	public static function ImgLastRunner()
	{
		return DB::table('carreras')
			->select('id', 'nombre','imagen')
			->orderBy('id', 'desc')
			->skip(0)
			->take(8)
			->get();
	}
	
	
	public static function ImgSlideShow()
	{
		
		return DB::table('imagenes')
			->select('id', 'archivo')
			->where('tipo_imagen', '=', 'full')
			->orderBy('id', 'asc')
			->skip(0)
			->take(10)
			->get();
	}
	
	public static function ImgRunners($id)
	{
		
		return DB::table('imagenes')
		->select('id', 'nombre')
		->where('id_carrera', '=', $id)
		->orderBy('id_carrera', 'desc')
		/*->skip(0)
		->take(8)*/
		->get();
	}
	
	public static function ImgsRunners($id, $requests)
	{
		
			// Devuelve todos las imagenes de esa carrera con paginacion
		 
		 
		 $imagenes = DB::table('ubicaciones as u')
			->join('imagenes as i', 'i.id_ubicacion', '=', 'u.id')
			->select('i.id',  'i.archivo', 'i.id_ubicacion',"i.etiquetas as tags", 'u.id_carrera as carrera')
			->where('i.tipo_imagen', '=', 'full')
			->where('u.id_carrera', '=', $id)
			->paginate(1); // cambiar parametro de pagineo al publicarlo de 15 imagenes por página
			$imagenes->setPath($requests->url());
		return  $imagenes;
		
		
	}
	public static function nameRunner($id)
	{
		
		 $nameR = DB::table('carreras')->where('id', $id)->pluck('nombre');
		 
		return $nameR; 
		
		
	}
	
		public static function idRunner($id)
	{
		 $idRun = DB::table('carreras')->where('id', $id)->pluck('id');
		 
		return $idRun; 
		
	}
	
	
		public static function searchTagCorrId($idRace, $qry, $request)
		{
			$nombre = $qry;
			
				//dd($qry);
				
				
				$allImgsRun = DB::table('imagenes as i')
					->join('ubicaciones as u', 'i.id_ubicacion', '=', 'u.id')
					->select('i.id',  'i.archivo', 'i.id_ubicacion as ubicacion',
								"i.etiquetas as tags", 'u.id_carrera as carrera')
					->where('i.etiquetas', 'LIKE', '%|'. $qry.'|%')
					//->orWhere('i.etiquetas', 'LIKE', '%'.$runParam_2.'|%')
					->where('i.tipo_imagen', '=', 'normal')
					->where('u.id_carrera', '=', $idRace)
					->paginate(1); // cambiar parametro de pagineo al publicarlo de 15 imagenes por página
					//->get(); 
					$allImgsRun->setPath($request->url());
					return $allImgsRun;
			
			
		
		}
		
		
		public static function searchTagCorrByName($idRace, $qry, $request)
		{
			//$nombre = $qry;
				
				DB::connection()->enableQueryLog(); // Inicia data base log
				
			//	dd($idCorre);  //imprime el script SQL de la consulta 
				
				$corredores = DB::table('corredores as c')
					->select('c.id', 'c.nombres', 'c.apellidos')
					->where('c.etiquetado', '=', '1')
					->where('c.nombres', 'LIKE', '%'.$qry.'%')
					->orWhere('c.apellidos', 'LIKE', '%'.$qry.'%')
					//->get(); // cambiar parametro de pagineo al publicarlo de 15 imagenes por página
					//dd(DB::getQueryLog());
					->paginate(2); // cambiar parametro de pagineo al publicarlo de 15 imagenes por página
					 
					
					//dd($corredores);
					$corredores->setPath($request->url());
					
					return $corredores;
				
			
		}
	
	
	

}
