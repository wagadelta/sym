<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagenes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_fotografo');
			$table->integer('id_etiquetador')->default('0');
			$table->string('path');
			$table->string('archivo');
			$table->string('slug');
			$table->enum('tipo_imagen', array('full','normal', 'thumb'));
			$table->text('etiquetas');
			$table->datetime('fecha_etiqueta');
			$table->integer('id_ubicacion');
			$table->string('estado');
			$table->char('is_blocked',1)->default('0');
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
		Schema::drop('imagenes');
	}

}
