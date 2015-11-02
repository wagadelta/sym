<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traslados extends Model
{
    
	public $table = "traslados";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "user_id_anterior",
		"user_id_actual",
		"observaciones",
		"estado"
	];

	public static $rules = [
	    "observaciones" => "required"
	];

}
