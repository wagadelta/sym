@extends('etiquetador')

@section('content')

    <link href="{{ asset('/css/magnifier.css') }}" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <h1 class="pull-left"><i class="fa fa-clock-o"></i>Imagenes para etiquetar</h1>
        </div>

        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div class="container">
                        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                           <h3> NO EXISTEN FOTOGRAFIAS PARA ESTA CARRERA. </h3>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                </div>
        </div>
        
        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{{ asset('imagenes') }}/etiquetar">Volver</a>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>        
    </div>
    
@endsection
