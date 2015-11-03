<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class ContratosTableSeeder extends Seeder {

public function run()
 {
    $faker = Faker::create('es_ES');

    foreach(range(1,500) as $index)
    {
      $monto        = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50000);
      $no_cuotas    = $faker->randomElement($array = array (3,6,10,12,24,48));
      $valor_cuota  = $monto/$no_cuotas;
      $contrato =
      [
          'monto' =>   $monto,
          'no_cuotas' => $no_cuotas,
          'valor_cuota' =>  $valor_cuota ,
          'periodo_cobro' =>  $faker->randomElement($array = array ('diario', 'semanal', 'quincenal', 'mensual')),
          'solicitado_por' =>  $faker->numberBetween($min = 2, $max = 5)  ,
          'solicitado_en' =>   $faker->dateTimeThisYear($max='now'),
          'aprobado_por' =>    $faker->numberBetween($min = 2, $max = 5)  ,
          'aprobado_en' =>    $faker->dateTimeThisYear($max='now'),
          'entrado_por' =>    $faker->numberBetween($min = 2, $max = 5)  ,
          'entregado_en' =>   $faker->dateTimeThisYear($max='now'),
          'entregado_gps' =>  $faker->latitude.", ".$faker->longitude  ,
          'pagado' =>     $faker->dateTimeThisYear($max='now'),
          'juridico_por' =>    $faker->numberBetween($min = 2, $max = 5)  ,
          'juridico_en' =>   $faker->dateTimeThisYear($max='now'),
          'incobrable_por' => $faker->numberBetween($min = 2, $max = 5)  ,
          'incobrable_en' =>  $faker->dateTimeThisYear($max='now'),
          'rechazado_por' =>  $faker->numberBetween($min = 2, $max = 5)  ,
          'rechazado_en' =>   $faker->dateTimeThisYear($max='now'),
          'conyugue_lugar_trabajo' =>   $faker->address ,
          'estado' => $faker->randomElement($array = array (
            'solicitado',
            'entregado',
            'aprobado',
            'rechazado',
            'juridico'))
      ];
      DB::table('contratos')->insert($contrato);
    } //foreach
 }//function
}//class
