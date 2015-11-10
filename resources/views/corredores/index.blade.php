@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Corredores</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('corredores.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($corredores->isEmpty())
                <div class="well text-center">No Corredores found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombres</th>
			<th>Apellidos</th>
			<th>Slug</th>
			<th>Identificacion</th>
			<th>Perfil</th>
			<th>Id Carrera</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($corredores as $corredores)
                        <tr>
                            <td>{!! $corredores->nombres !!}</td>
					<td>{!! $corredores->apellidos !!}</td>
					<td>{!! $corredores->slug !!}</td>
					<td>{!! $corredores->identificacion !!}</td>
					<td>{!! $corredores->perfil !!}</td>
					<td>{!! $corredores->id_carrera !!}</td>
					<td>{!! $corredores->estado !!}</td>
                            <td>
                                <a href="{!! route('corredores.edit', [$corredores->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('corredores.delete', [$corredores->id]) !!}" onclick="return confirm('Are you sure wants to delete this Corredores?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection