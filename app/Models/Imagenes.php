<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


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
	
	public static function ImgsRunners($id)
	{
		
		 //$nameR = DB::table('users')->where('name', 'John')->pluck('name');
		 
		 
		 $imagenes = DB::table('ubicaciones as u')
			->join('imagenes as i', 'i.id_ubicacion', '=', 'u.id')
			->select('i.id',  'i.archivo', 'i.id_ubicacion',"i.etiquetas as tags", 'u.id_carrera as carrera')
			->where('i.tipo_imagen', '=', 'full')
			->where('u.id_carrera', '=', $id)
			->get();
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
	

}
