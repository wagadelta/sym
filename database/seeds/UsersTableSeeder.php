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
      'identificacion' => '2546091390230',
    		'otra_identificacion' => '',
    		'email' => 'axelsarceno.delta@gmail.com',
    		'nombres' => 'admin axel',
    		'apellidos' => 'Sarceño',
    		'telefonos' => '',
    		'foto' => '',
    		'usuario' => 'admin-AXEL',
    		'password' => Hash::make('super15'),
    		'id_rol' => 1,  //administrador
	    ],
	    
	    [   ///usuario Pablo
      'id_supervisor' => 0,
      'identificacion' => '2548698793254',
    		'otra_identificacion' => '',
    		'email' => 'pablodelcid.delta@gmail.com',
    		'nombres' => 'admin pablo',
    		'apellidos' => 'del cid',
    		'telefonos' => '',
    		'foto' => '',
    		'usuario' => 'superP-ADMIN',
    		'password' => Hash::make('adminPass'),
    		'id_rol' => 1,  //administrador
	    ],
	    
	    
	    [
      'id_supervisor' => 0,
      'identificacion' => '2600',
    		'otra_identificacion' => '',
    		'email' => 'juandedios@gmail.com',
    		'nombres' => 'Juan Dios',
    		'apellidos' => 'Reyes',
    		'telefonos' => '',
    		'foto' => '',
    		'usuario' => 'superJ-ADMIN',
    		'password' => Hash::make('adminPass'),
    		'id_rol' => 1,  //administrador
	    ],
	    
	    [
      'id_supervisor' => 0,
      'identificacion' => '2601',
    		'otra_identificacion' => '',
    		'email' => 'sergio@gmail.com',
    		'nombres' => 'sergio',
    		'apellidos' => 'Estrada',
    		'telefonos' => '',
    		'foto' => '',
    		'usuario' => 'superS-ADMIN',
    		'password' => Hash::make('adminPass'),
    		'id_rol' => 1,  //administrador
	    ],
	    
	    [
      'id_supervisor' => 0,
      'identificacion' => '2602',
    		'otra_identificacion' => '',
    		'email' => 'axelsarceno@gmail.com',
    		'nombres' => 'axel',
    		'apellidos' => 'sarceno',
    		'telefonos' => '',
    		'foto' => '',
    		'usuario' => 'superA-ADMIN',
    		'password' => Hash::make('adminPass'),
    		'id_rol' => 1,  //administrador
	    ],
	    	
	    	
	    [
      'id_supervisor' => 0,
      'identificacion' => '2603',
    		'otra_identificacion' => '',
    		'email' => 'vladimir.vvgp@gmail.com',
    		'nombres' => 'vladimir',
    		'apellidos' => 'gonzalez',
    		'telefonos' => '',
    		'foto' => '',
    		'usuario' => 'superV-ADMIN',
    		'password' => Hash::make('adminPass'),
    		'id_rol' => 1,  //administrador
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
	    ],
	    /*
	    *  Users Photograph
	    */
	    
	   [
    'id_supervisor' => 2,
    'identificacion' => '2500',
      'otra_identificacion' => '',
      'email' => 'foto01@gmail.com',
      'nombres' => 'foto',
      'apellidos' => 'cero uno',
      'telefonos' => '',
      'foto' => '',
      'usuario' => 'foto01',
      'password' => Hash::make('fotos15'),
      'id_rol' => 3,  //fotografo
    ],

    [
    'id_supervisor' => 2,
    'identificacion' => '2501',
      'otra_identificacion' => '',
      'email' => 'foto02@gmail.com',
      'nombres' => 'foto',
      'apellidos' => 'cero dos',
      'telefonos' => '',
      'foto' => '',
      'usuario' => 'foto02',
      'password' => Hash::make('fotos15'),
      'id_rol' => 3,  //fotografo
    ],

    [
    'id_supervisor' => 2,
    'identificacion' => '2502',
      'otra_identificacion' => '',
      'email' => 'foto03@gmail.com',
      'nombres' => 'foto',
      'apellidos' => 'cero tres',
      'telefonos' => '',
      'foto' => '',
      'usuario' => 'foto03',
      'password' => Hash::make('fotos15'),
      'id_rol' => 3,  //fotografo
    ],
    
    [
        'id_supervisor' => 2,
        'identificacion' => '2503',
          'otra_identificacion' => '',
          'email' => 'foto04@gmail.com',
          'nombres' => 'foto',
          'apellidos' => 'cero cuatro',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'foto04',
          'password' => Hash::make('fotos15'),
          'id_rol' => 3,  //fotografo
        ],

      [
        'id_supervisor' => 2,
        'identificacion' => '2504',
          'otra_identificacion' => '',
          'email' => 'foto05@gmail.com',
          'nombres' => 'foto',
          'apellidos' => 'cero cinco',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'foto05',
          'password' => Hash::make('fotos15'),
          'id_rol' => 3,  //fotografo
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2505',
          'otra_identificacion' => '',
          'email' => 'foto06@gmail.com',
          'nombres' => 'foto',
          'apellidos' => 'cero seis',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'foto06',
          'password' => Hash::make('fotos15'),
          'id_rol' => 3,  //fotografo
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2506',
          'otra_identificacion' => '',
          'email' => 'foto07@gmail.com',
          'nombres' => 'foto',
          'apellidos' => 'cero siete',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'foto07',
          'password' => Hash::make('fotos15'),
          'id_rol' => 3,  //fotografo
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2507',
          'otra_identificacion' => '',
          'email' => 'foto08@gmail.com',
          'nombres' => 'foto',
          'apellidos' => 'cero ocho',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'foto08',
          'password' => Hash::make('fotos15'),
          'id_rol' => 3,  //fotografo
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2508',
          'otra_identificacion' => '',
          'email' => 'foto09@gmail.com',
          'nombres' => 'foto',
          'apellidos' => 'cero nueve',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'foto09',
          'password' => Hash::make('fotos15'),
          'id_rol' => 3,  //fotografo
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2509',
          'otra_identificacion' => '',
          'email' => 'foto10@gmail.com',
          'nombres' => 'foto',
          'apellidos' => 'uno cero',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'foto10',
          'password' => Hash::make('fotos15'),
          'id_rol' => 3,  //fotografo
        ],
    /*
	    * End Photograph Users
	    */
	   
	   /*
	   * Users Taggin 
	   */ 
	   [
    'id_supervisor' => 2,
    'identificacion' => '2400',
      'otra_identificacion' => '',
      'email' => 'etiqueta01@gmail.com',
      'nombres' => 'etiqueta',
      'apellidos' => 'cero uno',
      'telefonos' => '',
      'foto' => '',
      'usuario' => 'etiqueta01',
      'password' => Hash::make('fotos15'),
      'id_rol' => 2,  //etiquetador
    ],

    [
    'id_supervisor' => 2,
    'identificacion' => '2401',
      'otra_identificacion' => '',
      'email' => 'etiqueta02@gmail.com',
      'nombres' => 'etiqueta',
      'apellidos' => 'cero dos',
      'telefonos' => '',
      'foto' => '',
      'usuario' => 'etiqueta02',
      'password' => Hash::make('fotos15'),
      'id_rol' => 2,  //etiquetador
    ],

    [
    'id_supervisor' => 2,
    'identificacion' => '2402',
      'otra_identificacion' => '',
      'email' => 'etiqueta03@gmail.com',
      'nombres' => 'etiqueta',
      'apellidos' => 'cero tres',
      'telefonos' => '',
      'foto' => '',
      'usuario' => 'etiqueta03',
      'password' => Hash::make('fotos15'),
      'id_rol' => 2,  //etiquetador
    ],
    
     [
        'id_supervisor' => 2,
        'identificacion' => '2403',
          'otra_identificacion' => '',
          'email' => 'etiqueta04@gmail.com',
          'nombres' => 'etiqueta',
          'apellidos' => 'cero cuatro',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'etiqueta04',
          'password' => Hash::make('fotos15'),
          'id_rol' => 2,  //etiquetador
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2404',
          'otra_identificacion' => '',
          'email' => 'etiqueta05@gmail.com',
          'nombres' => 'etiqueta',
          'apellidos' => 'cero cinco',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'etiqueta05',
          'password' => Hash::make('fotos15'),
          'id_rol' => 2,  //etiquetador
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2405',
          'otra_identificacion' => '',
          'email' => 'etiqueta06@gmail.com',
          'nombres' => 'etiqueta',
          'apellidos' => 'cero seis',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'etiqueta06',
          'password' => Hash::make('fotos15'),
          'id_rol' => 2,  //etiquetador
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2406',
          'otra_identificacion' => '',
          'email' => 'etiqueta07@gmail.com',
          'nombres' => 'etiqueta',
          'apellidos' => 'cero siete',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'etiqueta07',
          'password' => Hash::make('fotos15'),
          'id_rol' => 2,  //etiquetador
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2407',
          'otra_identificacion' => '',
          'email' => 'etiqueta08@gmail.com',
          'nombres' => 'etiqueta',
          'apellidos' => 'cero ocho',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'etiqueta08',
          'password' => Hash::make('fotos15'),
          'id_rol' => 2,  //etiquetador
        ],

        [
        'id_supervisor' => 2,
        'identificacion' => '2408',
          'otra_identificacion' => '',
          'email' => 'etiqueta09@gmail.com',
          'nombres' => 'etiqueta',
          'apellidos' => 'cero nueve',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'etiqueta09',
          'password' => Hash::make('fotos15'),
          'id_rol' => 2,  //etiquetador
        ],
        
        [
        'id_supervisor' => 2,
        'identificacion' => '2409',
          'otra_identificacion' => '',
          'email' => 'etiqueta10@gmail.com',
          'nombres' => 'etiqueta',
          'apellidos' => 'uno cero',
          'telefonos' => '',
          'foto' => '',
          'usuario' => 'etiqueta10',
          'password' => Hash::make('fotos15'),
          'id_rol' => 2,  //etiquetador
        ]
	    
	 ];
 
    DB::table('users')->insert($user);
 }
 
}