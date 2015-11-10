<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

}
