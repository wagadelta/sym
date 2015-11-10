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
            {!! $ubicaciones->render() !!}
                <table class="table table-striped table-condensed">
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
                     
                    @foreach($ubicaciones as $ubicacion)
                        <tr>
                            <td>{!! $ubicacion->id_carrera !!}</td>
        					<td>{!! $ubicacion->nombre !!}</td>
        					<td>{!! $ubicacion->slug !!}</td>
        					<td>{!! $ubicacion->direccion !!}</td>
        					<td>{!! $ubicacion->geolocalizacion !!}</td>
        					<td>{!! $ubicacion->estado !!}</td>
                            <td>
                                <a href="{!! route('ubicaciones.edit', [$ubicacion->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('ubicaciones.delete', [$ubicacion->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ubicaciones?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $ubicaciones->render() !!}
            @endif
        </div>
    </div>
@endsection