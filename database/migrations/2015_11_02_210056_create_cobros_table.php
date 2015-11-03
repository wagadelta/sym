<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cobros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_contrato');
			$table->integer('id_usuario');
			$table->float('monto_a_pagar');
			$table->float('monto_pagado');
			$table->integer('no_recibo');
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
		Schema::drop('cobros');
	}

}
