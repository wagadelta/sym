<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class CorredoresTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');

    foreach(range(1,500) as $index)
     {
        $name       = $faker->firstName($gender = null|'male'|'female');
        $lastName   = $faker->lastName;
        $slug       = Str::slug($name.'-'.$lastName);
        
      $corredor =
      [
      'nombres'         => $name,
      'apellidos'       => $lastName,
      'slug'            => $slug,
      'identificacion'  => $faker->ean8,
      'id_carrera'      => $faker->numberBetween($min = 1, $max = 25),
      'estado'          => '1'
      ];
      DB::table('corredores')->insert($corredor);
    } //foreach
 }//function
}//class
