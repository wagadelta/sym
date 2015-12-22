<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carreras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('slug');
			$table->datetime('fecha');
			$table->text('descripcion');
			$table->string('imagen');
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
		Schema::drop('carreras');
	}

}
