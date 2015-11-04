@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Personas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('personas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($personas->isEmpty())
                <div class="well text-center">No Personas found.</div>
            @else
                <table class="table">
                    <thead>
                    <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Identificacion</th>
                    <th>Otra Identificacion</th>
                    <th>Fecha Nacimiento</th>
                    <th>Domicilio</th>
                    <th>Telefonos</th>
                    <th>Foto</th>
                    <th>Foto Dpi</th>
                    <th>Conyugue Nombre</th>
                    <th>Conyugue Lugar Trabajo</th>
                    <th>Conyugue Telefono</th>
                    <th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($personas as $personas)
                        <tr>
                            <td>{!! $personas->nombres !!}</td>
                            <td>{!! $personas->apellidos !!}</td>
                            <td>{!! $personas->identificacion !!}</td>
                            <td>{!! $personas->otra_identificacion !!}</td>
                            <td>{!! $personas->fecha_nacimiento !!}</td>
                            <td>{!! $personas->domicilio !!}</td>
                            <td>{!! $personas->telefonos !!}</td>
                            <td>{!! $personas->foto !!}</td>
                            <td>{!! $personas->foto_dpi !!}</td>
                            <td>{!! $personas->conyugue_nombre !!}</td>
                            <td>{!! $personas->conyugue_lugar_trabajo !!}</td>
                            <td>{!! $personas->conyugue_telefono !!}</td>
                            <td>{!! $personas->estado !!}</td>
                            <td>
                                <a href="{!! route('personas.edit', [$personas->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('personas.delete', [$personas->id]) !!}" onclick="return confirm('Are you sure wants to delete this Personas?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection