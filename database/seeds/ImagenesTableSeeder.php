<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ImagenesTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');
    
    foreach(range(1,25) as $index)
     {
        $name = 'Carrera '.$faker->sentence($nbWords = 3);
        $val = $faker->numberBetween($min = 2, $max = 10);
        $etiquetas="";
        foreach(range(1,$val) as $index)
         {
          $etiquetas .=  $faker->numberBetween($min = 1, $max = 500)."|";
         }

      $imagen =
      [
      'id_fotografo'      => $faker->randomElement($array = array (3,5,6)),
      'id_etiquetador'    => $faker->randomElement($array = array (2,4)),
      'path'              => $faker->imageUrl(300,300, 'sports', 'Faker'),
      'archivo'           => $faker->word.".jpg",
      'slug'              => 'nombre-archivo',
      'tipo_imagen'       => $faker->randomElement($array = array ('full','normal','thumb')),
      'etiquetas'         => $etiquetas,
      'fecha_etiqueta'    => $faker->dateTimeThisYear($max='now'),
      'id_ubicacion'      => $faker->numberBetween($min = 1, $max = 200),
      'estado'            => '1'
      ];
      DB::table('imagenes')->insert($imagen);
    } //foreach
 }//function
}//class

