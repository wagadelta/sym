<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ImagenesTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');
    $imagePath = '/storage/images/';
    
    foreach(range(1,25) as $index)
     {
        $name = 'Carrera '.$faker->sentence($nbWords = 3);
        $val = $faker->numberBetween($min = 2, $max = 10);
        $etiquetas="";
        foreach(range(1,$val) as $index)
         {
          $etiquetas .=  $faker->numberBetween($min = 1, $max = 500)."|";
         }

     $fotografoId = $faker->randomElement($array = array (3,5,6));
     $ubicacionId = $faker->numberBetween($min = 1, $max = 200);
     
     
    // thumbnail
      $imageFake     = file_get_contents($faker->imageUrl('150', '100', 'sports'));
      $imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-thumb.jpg';
      $thumb_to_save = base_path() .$imagePath. $imageName;
      file_put_contents($thumb_to_save, $imageFake);
    
      $imagen =
      [
      'id_fotografo'      => $fotografoId,
      'id_etiquetador'    => $faker->randomElement($array = array (2,4)),
      'path'              => $thumb_to_save,
      'archivo'           => $imageName,
      'slug'              => $imageName,
      'tipo_imagen'       => 'thumb', //$faker->randomElement($array = array ('full','normal','thumb')),
      'etiquetas'         => $etiquetas,
      'fecha_etiqueta'    => $faker->dateTimeThisYear($max='now'),
      'id_ubicacion'      => $ubicacionId,
      'estado'            => '1'
      ];
      DB::table('imagenes')->insert($imagen);
    } //foreach
 }//function
}//class

