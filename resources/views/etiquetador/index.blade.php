@extends('etiquetador')

@section('content')

<?php echo ' vista de etiquetador '; ?>
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
            {!! $imagenes->render() !!}
                <table class="table table-striped table-condensed">
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
                     
                    @foreach($imagenes as $imagen)
                        <tr>
                            <td>{!! $imagen->id_fotografo !!}</td>
        					<td>{!! $imagen->id_etiquetador !!}</td>
        					<td><img src="uploads/{!! $imagen->archivo !!}" width="75" height="75">
        					    <br>{!! $imagen->path !!}
        					</td>
        					<td>{!! $imagen->archivo !!}</td>
        					<td>{!! $imagen->slug !!}</td>
        					<td>{!! $imagen->tipo_imagen !!}</td>
        					<td>{!! $imagen->etiquetas !!}</td>
        					<td>{!! $imagen->fecha_etiqueta !!}</td>
        					<td>{!! $imagen->id_ubicacion !!}</td>
        					<td>{!! $imagen->estado !!}</td>
                            <td>
                                <a href="{!! route('imagenes.edit', [$imagen->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('imagenes.delete', [$imagen->id]) !!}" onclick="return confirm('Are you sure wants to delete this Imagenes?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $imagenes->render() !!}
            @endif
        </div>
    </div>
@endsection