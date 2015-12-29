<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorredoresTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corredores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombres');
			$table->string('apellidos');
			$table->string('slug');
			$table->text('bib_number');
			$table->integer('id_carrera')->unsigned();
			$table->integer('etiqueta_count')->default(0); // 0 es = sin imagenes etiquetadas y 1 es si hay imagenes por lo menos 1
			$table->string('estado')->default('1');

			$table->foreign('id_carrera')->references('id')->on('carreras')->onDelete('cascade');
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
		Schema::drop('corredores');
	}

}
