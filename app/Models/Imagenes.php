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
		"estado"
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
			->select('id', 'nombre')
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
			->orderBy('id', 'desc')
			->skip(0)
			->take(3)
			->get();
	}
	
	public static function ImgUbicaciones($id)
	{
		
		return DB::table('ubicaciones')
		->select('id', 'nombre')
		->where('id_carrera', '=', $id)
		->orderBy('id_carrera', 'desc')
		/*->skip(0)
		->take(8)*/
		->get();
	}
	
	public static function ImgRunners($id)
	{
		
		return DB::table('imagenes')
		->select('id', 'archivo','tipo_imagen','etiquetas')
		->where('tipo_imagen', '=', 'full')
		->where('id_ubicacion', '=', $id)
		->orderBy('id', 'desc')
		/*->skip(0)
		->take(12)*/
		->get();
	}
	
	
	

}
