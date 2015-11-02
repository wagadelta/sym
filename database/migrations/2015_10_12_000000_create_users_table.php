<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_supervisor')->unsigned()->nullable()->default(null);
			$table->string('identificacion');
			$table->string('otra_identificacion')->nullable();
			$table->string('email')->unique();
			$table->string('nombres');
			$table->string('apellidos');
			$table->string('telefonos')->nullable();
			$table->string('foto')->nullable();
			$table->string('correlativo_recibo_cobro')->nullable();
			$table->string('correlativo_recibo_entrega')->nullable();
			$table->string('usuario');
			$table->string('password', 60);
			$table->integer('id_rol')->unsigned();
			$table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
