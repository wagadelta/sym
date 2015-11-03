<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispositivosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dispositivos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('marca');
			$table->string('numero');
			$table->string('modelo');
			$table->string('serial');
			$table->integer('id_usuario');
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
		Schema::drop('dispositivos');
	}

}
