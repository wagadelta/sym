<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    
	public $table = "contratos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "monto",
		"no_cuotas",
		"valor_cuota",
		"perido_cobro",
		"solicitado_por",
		"solicitado_en",
		"aprobado_por",
		"aprobado_en",
		"entrado_por",
		"entregado_en",
		"entregado_gps",
		"pagado",
		"juridico_por",
		"juridico_en",
		"incobrable_por",
		"incobrable_en",
		"rechazado_por",
		"rechazado_en",
		"conyugue_lugar_trabajo",
		"estado"
	];

	public static $rules = [
	    "monto" => "required",
		"no_cuotas" => "required",
		"valor_cuota" => "required",
		"perido_cobro" => "required"
	];

}
