@extends('layout.publicalayout')

@section('content')

<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
  <!--<img src="{--{ asset('images') }--}/ad2.jpg" class="img-responsive  ads-cls"/> </img>-->
</div>
<div class="col-lg-8 col-md-8 col-xs-12 div-center">
  <div class="row">
    <div id="logo" class="col-xs-6 col-sm-8 col-md-8 col-lg-8 ">
      <a href="{{ asset('/') }}" >
        <img src="{{ asset('images') }}/logo.png">
      </a>
    </div>
    <div id="logo" class="col-lg-2 col-md-2 col-xs-6">
      <a href="#" >
        <!--Registro-->
      </a>
      <!--|-->
      <a href="#" >
        <!--Ingresar-->
      </a>

    </div>
    <div class="row">


    </div>

    <div class="row">
      <div class="row center col-lg-12 col-md-12 col-xs-12">
        @include('flash::message')

        <div class="row col-lg-12 col-md-12 col-xs-12">
          <h1 class="pull-left"> <i class="fa fa-child"></i> Resultado de búsqueda: {{ $qry }}</h1>
          <!--<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('corredores.create') !!}">Add New</a>-->
        </div>

        <div class="row col-lg-12 col-md-12 col-xs-12 centerT">
          @if($allImgsRun->isEmpty())
          <div class="well text-center color-text-b"> <h5> No hay resultados para ésta búsqueda. </h5>
             <a href="{{asset('/')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>Regresar al inicio</a>
          </div>

          @else

          <table class="well table table-striped tablb-condensed color-text-b ">
            <thead>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Carrera</th>
              <th>Imagenes</th>
            </thead>
            <tbody>

              @foreach($allImgsRun as $corredor)
              <tr>
                <td>{!! $corredor->nombres !!}</td>
                <td>{!! $corredor->apellidos !!}</td>
                <td>{!! $name !!}</td>
                <td>
                  ({!! $corredor->etiqueta_count!!})
                  <a href ="{{ asset('corredores') }}/{!! $corredor->bib_number !!}/{!! $corredor->id_carrera !!}/images" title="Ver imágenes relacionadas">
                    <i class="fa fa-camera fa-2x"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          @endif
        </div>

        <div class="row center">
          <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">

          </div>

          <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8 text-center">
            {!! $allImgsRun->render()!!}
          </div>

          <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
  <!--<img src="{--{ asset('images') }--}/ad2.jpg" class="img-responsive  ads-cls"/> </img>-->
</div>


@endsection
