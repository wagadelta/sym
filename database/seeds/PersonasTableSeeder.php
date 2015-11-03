<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class PersonasTableSeeder extends Seeder {
public function run()
 {
    $faker = Faker\Factory::create('es_ES');
    $persona = 
    [
     'nombre' => $faker->name, 
     'identificacion' => $faker->randomNumber($nbDigits = NULL)
    ];
    dd($persona);
    //DB::table('personas')->insert($rol);
 }
 
}
