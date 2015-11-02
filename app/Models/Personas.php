<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    
	public $table = "personas";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"identificacion",
		"otra_identificacion",
		"fecha_nacimiento",
		"domicilio",
		"telefonos",
		"foto",
		"foto_dpi",
		"conyugue_nombre",
		"conyugue_lugar_trabajo",
		"estado"
	];

	public static $rules = [
	    "nombre" => "required",
		"identificacion" => "required",
		"otra_identificacion" => "required",
		"fecha_nacimiento" => "required"
	];

}
