@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"> <i class="fa fa-map-marker"></i> Ubicaciones</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ubicaciones.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($ubicaciones->isEmpty())
                <div class="well text-center">No Ubicaciones found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Id Carrera</th>
			<th>Nombre</th>
			<th>Slug</th>
			<th>Direccion</th>
			<th>Geolocalizacion</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($ubicaciones as $ubicaciones)
                        <tr>
                            <td>{!! $ubicaciones->id_carrera !!}</td>
					<td>{!! $ubicaciones->nombre !!}</td>
					<td>{!! $ubicaciones->slug !!}</td>
					<td>{!! $ubicaciones->direccion !!}</td>
					<td>{!! $ubicaciones->geolocalizacion !!}</td>
					<td>{!! $ubicaciones->estado !!}</td>
                            <td>
                                <a href="{!! route('ubicaciones.edit', [$ubicaciones->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('ubicaciones.delete', [$ubicaciones->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ubicaciones?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection