<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ubicaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_carrera');
			$table->string('nombre');
			$table->string('slug');
			$table->text('direccion');
			$table->string('geolocalizacion')->default('-90.014, 14.004');
			$table->string('estado')->default('1');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ubicaciones');
	}

}
