<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicaciones extends Model
{

  public $table = "ubicaciones";

  public $primaryKey = "id";

  public $timestamps = true;

  public $fillable = [
    "id_carrera",
    "nombre",
    "slug",
    "direccion",
    "geolocalizacion",
    "estado"
  ];

  public static $rules = [
    "id_carrera" => "required",
    "nombre" => "required",
    "slug" => "required",
    "direccion" => "required"
  ];

  public function carrera()
  {
    return $this->belongsTo('App\Models\Carreras', 'id_carrera');
  }

}
