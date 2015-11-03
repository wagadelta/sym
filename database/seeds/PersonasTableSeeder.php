<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class PersonasTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');

    foreach(range(1,30) as $index)
    {
        \Personas::create([
          'nombre' => $faker->name ,
          'identificacion' => $faker->randomNumber(11) ,
          'otra_identificacion' =>  $faker->randomNumber(6) ,
          'fecha_nacimiento' =>  $faker->dateTimeBetween($startDate = '-50 years', $endDate = 'now') ,
          'domicilio' =>  $faker->address,
          'telefonos' =>  $faker->randomNumber(8),
          'foto' =>  'path',
          'foto_dpi' =>  'path',
          'conyugue_nombre' =>  $faker->name,
          'conyugue_lugar_trabajo' => $faker->address ,
          'estado' => $faker->randomElement($array = array ('activo','cancelado','suspendido'))
        ]);
    } //foreach
 }//function
}//class
