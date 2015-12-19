@extends('etiquetador')

@section('content')

    <div class="container">
        
        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"><i class="fa fa-clock-o"></i> Elija Carrera para Etiquetar </h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('carreras.create') !!}">Add New</a>
        </div>

        <div class="row">
            
                <?php 
                    echo '<pre>';
                    var_dump($image);
                    echo '</pre>';
                ?>       
            
        </div>
    </div>
@endsection