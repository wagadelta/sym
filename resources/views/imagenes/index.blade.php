@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"> <i class="fa fa-picture-o"></i> Imagenes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('imagenes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($imagenes->isEmpty())
                <div class="well text-center">No Imagenes found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Id Fotografo</th>
			<th>Id Etiquetador</th>
			<th>Path</th>
			<th>Archivo</th>
			<th>Slug</th>
			<th>Tipo Imagen</th>
			<th>Etiquetas</th>
			<th>Fecha Etiqueta</th>
			<th>Id Ubicacion</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($imagenes as $imagenes)
                        <tr>
                            <td>{!! $imagenes->id_fotografo !!}</td>
					<td>{!! $imagenes->id_etiquetador !!}</td>
					<td>{!! $imagenes->path !!}</td>
					<td>{!! $imagenes->archivo !!}</td>
					<td>{!! $imagenes->slug !!}</td>
					<td>{!! $imagenes->tipo_imagen !!}</td>
					<td>{!! $imagenes->etiquetas !!}</td>
					<td>{!! $imagenes->fecha_etiqueta !!}</td>
					<td>{!! $imagenes->id_ubicacion !!}</td>
					<td>{!! $imagenes->estado !!}</td>
                            <td>
                                <a href="{!! route('imagenes.edit', [$imagenes->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('imagenes.delete', [$imagenes->id]) !!}" onclick="return confirm('Are you sure wants to delete this Imagenes?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection