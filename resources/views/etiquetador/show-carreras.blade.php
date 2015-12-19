@extends('etiquetador')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"><i class="fa fa-clock-o"></i> Elija Carrera para Etiquetar </h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('carreras.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($carreras->isEmpty())
                <div class="well text-center">No Carreras found.</div>
            @else
                <table class="table table-striped table-condensed">
                    <thead>
                        <th>Nombre /<br> Descripcion</th>
            			<!-- <th>Slug</th> se quita slug de la vista de imagenes -->
            			<th>Fecha</th>
            			<th>Etiquetar</th>
                    <tbody>
                    @foreach($carreras as $carrera)
                    <tr>
                        <td>{!! $carrera->nombre !!}<br><textarea row=2>{!! $carrera->descripcion !!}</textarea></td>
    					<!-- <td>{--!! $carrera->slug !!--}</td> -->
    					<td>{!! $carrera->fecha !!}</td>
    					<td><a class="btn btn-primary pull-right" style="margin-top: 25px" href="{{ asset('imagenes') }}/etiquetar/carrera/{!! $carrera->id !!}">Etiquetar</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
