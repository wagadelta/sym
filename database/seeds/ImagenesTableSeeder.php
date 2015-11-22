<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Intervention\Image\Facades\Image;


class ImagenesTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');
    $imagePath = '/public/uploads/';
    
    foreach(range(1,10) as $index)
     {
        $name = 'Carrera '.$faker->sentence($nbWords = 3);
        $val = $faker->numberBetween($min = 2, $max = 15);
        $etiquetas="";
        foreach(range(1,$val) as $index)
         {
          $etiquetas .=  $faker->numberBetween($min = 1, $max = 500)."|";
         }

     $fotografoId = $faker->randomElement($array = array (3,5,6));
     $ubicacionId = $faker->numberBetween($min = 1, $max = 200);
     
     
    // FULL image
      $watermark = Image::make(base_path().'/public/images/sym-watermark.png');
      $imageFake     = file_get_contents($faker->imageUrl('1024', '768'));
      $imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-full.jpg';
      $pathToSave    = base_path() .$imagePath. $imageName;
      file_put_contents($pathToSave, $imageFake);
      $img = Image::make($pathToSave);
      $img->insert($watermark, 'bottom-right')->save($pathToSave);
    
      $imagen =
      [
      'id_fotografo'      => $fotografoId,
      'id_etiquetador'    => $faker->randomElement($array = array (2,4)),
      'path'              => $pathToSave,
      'archivo'           => $imageName,
      'slug'              => $imageName,
      'tipo_imagen'       => 'full', //$faker->randomElement($array = array ('full','normal','thumb')),
      'etiquetas'         => $etiquetas,
      'fecha_etiqueta'    => $faker->dateTimeThisYear($max='now'),
      'id_ubicacion'      => $ubicacionId,
      'estado'            => '1'
      ];
      DB::table('imagenes')->insert($imagen);
      
    // NORMAL  image
      $imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-normal.jpg';
      $pathToSave    = base_path() .$imagePath. $imageName;
      $img->resize(452, 340)->save($pathToSave);
    
      $imagen =
      [
      'id_fotografo'      => $fotografoId,
      'id_etiquetador'    => $faker->randomElement($array = array (2,4)),
      'path'              => $pathToSave,
      'archivo'           => $imageName,
      'slug'              => $imageName,
      'tipo_imagen'       => 'normal', //$faker->randomElement($array = array ('full','normal','thumb')),
      'etiquetas'         => $etiquetas,
      'fecha_etiqueta'    => $faker->dateTimeThisYear($max='now'),
      'id_ubicacion'      => $ubicacionId,
      'estado'            => '1'
      ];
      DB::table('imagenes')->insert($imagen);

// THUMB  image
      $imageName     = 'f-'.$fotografoId.'_u-'.$ubicacionId.'-thumb.jpg';
      $pathToSave    = base_path() .$imagePath. $imageName;
      $img->resize(150, 100)->save($pathToSave);
    
      $imagen =
      [
      'id_fotografo'      => $fotografoId,
      'id_etiquetador'    => $faker->randomElement($array = array (2,4)),
      'path'              => $pathToSave,
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

