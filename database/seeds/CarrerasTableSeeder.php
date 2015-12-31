<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class CarrerasTableSeeder extends Seeder {

public function run()
 {
  /*  $faker = Faker::create('es_ES');

    foreach(range(1,4) as $index)
     {
        $name = 'Carrera '.$faker->sentence($nbWords = 3);
        $slug = Str::slug($name);

      $carrera =
      [
      'nombre'      => $name,
      'slug'        => $slug,
      'fecha'       => $faker->dateTimeThisYear($max='now'),
      'descripcion' => $faker->paragraph($nbSentences = 3),
      'imagen'      => $faker->imageUrl(400,300, 'sports', 'Faker'),
      'estado'      => '1'
      ];
      DB::table('carreras')->insert($carrera);
    } //foreach*/
 }//function
}//class
