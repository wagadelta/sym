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
			$table->datetime('fecha_pago');
			$table->float('cuotas_a_pagar');
			$table->float('cuotas_pagadas');
			$table->integer('no_recibo');
			$table->integer('no_aviso');
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
