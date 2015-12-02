@extends('etiquetador')

@section('content')

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
                    {!! Form::textarea('etiquetas', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left" >
                    <a class="btn btn-success pull-right" style="margin-top: 25px" href="{!! route('carreras.create') !!}">Guardar Etiquetas</a>
                </div>
                
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        
    </div>
@endsection