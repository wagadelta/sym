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
			$table->datetime('apellidos');
			$table->string('slug');
			$table->text('identificacion');
			$table->string('perfil');
			$table->integer('id_carrera');
			$table->string('estado');
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
