<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {
public function run()
 {
  $user = [
     [
      'id_supervisor' => 0,
      'identificacion' => '2757704190101',
    		'otra_identificacion' => '',
    		'email' => 'supervisor@gmail.com',
    		'nombres' => 'admin wilver',
    		'apellidos' => 'arreaga',
    		'telefonos' => '',
    		'foto' => '',
    		'usuario' => 'admin-WAGA',
    		'password' => Hash::make('super15'),
    		'id_rol' => 1,  //administrador
	    ],
	    [
      'id_supervisor' => 0,
      'identificacion' => '4654656',
    		'otra_identificacion' => '',
    		'email' => 'jervin@gmail.com',
    		'nombres' => 'jervin',
    		'apellidos' => 'arreaga',
    		'telefonos' => '32155985',
    		'foto' => '',
    		'usuario' => 'superjervin',
    		'password' => Hash::make('jervinpass'),
    		'id_rol' => 2,  //etiquetador
	    ],
	    [
      'id_supervisor' => 2,
      'identificacion' => '4654656',
    		'otra_identificacion' => '',
    		'email' => 'fabio@gmail.com',
    		'nombres' => 'fabio',
    		'apellidos' => 'gonzalez fuentes',
    		'telefonos' => '32155985',
    		'foto' => '',
    		'usuario' => 'fabio',
    		'password' => Hash::make('fabiopass'),
    		'id_rol' => 3,  //fotografo
	    ],
	    	    [
      'id_supervisor' => 0,
      'identificacion' => '2757704190101',
    		'otra_identificacion' => '',
    		'email' => 'wagagt@gmail.com',
    		'nombres' => 'super waga',
    		'apellidos' => 'gonzalez arreaga',
    		'telefonos' => '30368985',
    		'foto' => '',
    		'usuario' => 'superwaga',
    		'password' => Hash::make('waga15'),
    		'id_rol' => 2,  //etiquetador
	    ],
	    [
      'id_supervisor' => 4,
      'identificacion' => '4654656',
    		'otra_identificacion' => '',
    		'email' => 'diego@gmail.com',
    		'nombres' => 'diego',
    		'apellidos' => 'gonzalez fuentes',
    		'telefonos' => '32155985',
    		'foto' => '',
    		'usuario' => 'diego',
    		'password' => Hash::make('diegopass'),
    		'id_rol' => 3,  //fotografo
	    ],
	    [
      'id_supervisor' => 4,
      'identificacion' => '4654656',
    		'otra_identificacion' => '',
    		'email' => 'diego2@gmail.com',
    		'nombres' => 'diego2',
    		'apellidos' => 'gonzalez fuentes',
    		'telefonos' => '32155985',
    		'foto' => '',
    		'usuario' => 'diego2',
    		'password' => Hash::make('diegopass'),
    		'id_rol' => 3,  //fotografo
	    ]
	    
	 ];
 
    DB::table('users')->insert($user);
 }
 
}