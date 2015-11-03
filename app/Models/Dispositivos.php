<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    
	public $table = "dispositivos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "marca",
		"numero",
		"modelo",
		"serial",
		"id_usuario",
		"estado"
	];

	public static $rules = [
	    "marca" => "required",
		"numero" => "required",
		"modelo" => "required"
	];

}
