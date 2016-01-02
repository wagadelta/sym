<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class CarrerasTableSeeder extends Seeder {

  public function run()
  {
    $carrera = [
      [
        'nombre' => 'Medio Maratón Coban 2015',
        'slug' => 'medio-maraton-coban-2015',
        'fecha' => '2015-05-24 08:00:25',
        'descripcion' => 'Medio maratón coban 2015, 21K',
        'imagen' => 'http://runguate.com/run/wp-content/uploads/2014/11/10974488_921936814513293_831832581243869824_o.jpg',
      ],
      [
        'nombre' => 'Medio Maratón Las Rosas 2015',
        'slug' => 'medio-maraton-las-rosas-2015',
        'fecha' => '2015-06-19 08:00:25',
        'descripcion' => 'Medio Las Rosas Antigua 2015, 21K',
        'imagen' => 'http://runguate.com/run/wp-content/uploads/2015/06/19-JULIO-LAS-ROSAS.png',
      ],
      [
        'nombre' => '21K De la Ciudad de Guatemala 2015',
        'slug' => '21k-de-la-ciudad-de-guatemala-2015',
        'fecha' => '2015-08-23 07:30:25',
        'descripcion' => '21K Organizado por la minicipalidad de Guatemala',
        'imagen' => 'http://36.media.tumblr.com/f57a5106e249cc10a8546f2183dba652/tumblr_nrn87bPtKg1s4fklvo1_1280.jpg',
      ],
      [
        'nombre' => 'Maya Maraton 2015',
        'slug' => '21k-de-la-ciudad-de-guatemala-2015',
        'fecha' => '2015-11-22 07:00:25',
        'descripcion' => '10K, 21K, 42K Maya Maratón la Emblemática 2015 ',
        'imagen' => 'http://runguate.com/run/wp-content/uploads/2015/08/22-NOV-MAYA-MARATON-2015.jpg',
      ],
    ];
    DB::table('carreras')->insert($carrera);

  }//function
}//class
