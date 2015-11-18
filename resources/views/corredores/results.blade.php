@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"> <i class="fa fa-child"></i> Resultado de búsqueda {{ $qry }}</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('corredores.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($corredores->isEmpty())
                <div class="well text-center">No Corredores found.</div>
            @else
            
                <table class="table table-striped table-condensed">
                    <thead>
                    <th>Nombres</th>
			<th>Apellidos</th>
			<th>Imagenes</th>
                    </thead>
                    <tbody>
                     
                    @foreach($corredores as $corredor)
                        <tr>
                            <td>{!! $corredor->nombres !!}</td>
        					<td>{!! $corredor->apellidos !!}</td>
        					<td><a href ="/corredores/{!! $corredor->id !!}/images">Ver Fotos</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
            @endif
        </div>
    </div>
@endsection