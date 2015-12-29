<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corredores extends Model
{

	public $table = "corredores";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"nombres",
		"apellidos",
		"slug",
		"bib_number",
		"id_carrera",
		"estado"
	];

	public static $rules = [
		"nombres" 		=> "required",
		"apellidos" 	=> "required",
		"slug" 				=> "required",
		"id_carrera" 	=> "required"
	];

	public function carrera()
	{
		return $this->belongsTo('App\Models\Carreras', 'id_carrera');
	}

}
