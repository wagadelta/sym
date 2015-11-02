<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {
public function run()
 {
  $user = [
     [
      'id_supervisor' => null,
      'identificacion' => '2757704190101',
    		'otra_identificacion' => '',
    		'email' => 'supervisor@gmail.com',
    		'nombres' => 'super wilver',
    		'apellidos' => 'arreaga',
    		'telefonos' => '',
    		'foto' => '',
    		'correlativo_recibo_cobro' => '',
    		'correlativo_recibo_entrega' => '',
    		'usuario' => 'super-WAGA',
    		'password' => Hash::make('super15'),
    		'id_rol' => 1,  //administrador
	    ],
	    [
      'id_supervisor' => 1,
      'identificacion' => '2757704190101',
    		'otra_identificacion' => '',
    		'email' => 'wagagt@gmail.com',
    		'nombres' => 'wilver adolfo',
    		'apellidos' => 'gonzalez arreaga',
    		'telefonos' => '30368985',
    		'foto' => '',
    		'correlativo_recibo_cobro' => '1',
    		'correlativo_recibo_entrega' => '1',
    		'usuario' => 'wagagt',
    		'password' => Hash::make('waga15'),
    		'id_rol' => 2,  //administrador
	    ]
	 ];
 
    DB::table('users')->insert($user);
 }
 
}