@extends('etiquetador')

@section('content')

    {!! Form::model($image, ['url' => ['imagenes/etiquetar', $image->id], 'method' => 'post']) !!}
    
    <div class="container">
        
        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"><i class="fa fa-clock-o"></i>Ingrese etiquetas</h1>
        </div>

        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <img src="/uploads/{!! $image->archivo !!}">
                </div>
                
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        
        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
              
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    {!! Form::label('Etiquetas', 'Etiquetas:') !!}
                    {!! Form::textarea('etiquetas', $etiquetasString, ['class' => 'form-control','size' => '30x2']) !!}
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    {!! Form::submit('Etiquetar', ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        
        
    </div>
    {!! Form::hidden('etiquetas_original', $image->etiquetas) !!}
    {!! Form::hidden('carreraId', $carreraId) !!}
    {!! Form::close() !!}
@endsection