<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobros extends Model
{
    
	public $table = "cobros";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "id_contrato",
		"id_usuario",
		"monto_a_pagar",
		"monto_pagado",
		"no_recibo",
		"estado"
	];

	public static $rules = [
	    "id_contrato" => "required",
		"id_usuario" => "required",
		"monto_a_pagar" => "required"
	];

}
