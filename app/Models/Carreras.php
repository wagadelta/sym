<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{

	public $table = "carreras";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"nombre",
		"slug",
		"fecha",
		"descripcion",
		"imagen",
		"estado"
	];

	public static $rules = [
		"nombre" 			=> "required",
		"slug" 				=> "required",
		"fecha" 			=> "required",
		"descripcion" => "required"
	];

	public function corredor()
	{
		return $this->hasOne('App\Models\Corredores');
	}

	public function ubicaciones()
	{
		return $this->hasMany('App\Models\Ubicaciones');

	}

}
