<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class UbicacionesTableSeeder extends Seeder {

public function run()
 {
    /*$faker = Faker::create('es_ES');

    foreach(range(1,10) as $index)
     {
        $name = 'Ubicacion '.$faker->sentence($nbWords = 1);
        $slug = Str::slug($name);

      $ubicacion =
      [
      'id_carrera'      => $faker->numberBetween($min = 1, $max = 4),
      'nombre'          => $name,
      'slug'            => $slug,
      'direccion'       => $faker->address,
      'geolocalizacion' => $faker->latitude.', '.$faker->longitude,
      'estado'      => '1'
      ];
      DB::table('ubicaciones')->insert($ubicacion);
    } //foreach*/
 }//function
}//class
