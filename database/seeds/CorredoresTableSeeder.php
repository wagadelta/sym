<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class CorredoresTableSeeder extends Seeder {

  public function run()
  {
    /*$faker = Faker::create('es_ES');

    foreach(range(1,50) as $index)
    {
      $name       = $faker->firstName($gender = null|'male'|'female');
      $lastName   = $faker->lastName;
      $slug       = Str::slug($name.'-'.$lastName);

      $corredor =
      [
        'nombres'         => $name,
        'apellidos'       => $lastName,
        'slug'            => $slug,
        'bib_number'      => $faker->numberBetween($min = 1, $max = 200),
        'etiqueta_count'  => $faker->randomElement($array = array (0,100)),
        'id_carrera'      => $faker->numberBetween($min = 1, $max = 4),
        'estado'          => '1'
      ];
      DB::table('corredores')->insert($corredor);
    } //foreach*/
  }//function
}//class
