@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Dispositivos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('dispositivos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($dispositivos->isEmpty())
                <div class="well text-center">No Dispositivos found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Marca</th>
			<th>Numero</th>
			<th>Modelo</th>
			<th>Serial</th>
			<th>Id Usuario</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($dispositivos as $dispositivos)
                        <tr>
                            <td>{!! $dispositivos->marca !!}</td>
					<td>{!! $dispositivos->numero !!}</td>
					<td>{!! $dispositivos->modelo !!}</td>
					<td>{!! $dispositivos->serial !!}</td>
					<td>{!! $dispositivos->id_usuario !!}</td>
					<td>{!! $dispositivos->estado !!}</td>
                            <td>
                                <a href="{!! route('dispositivos.edit', [$dispositivos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('dispositivos.delete', [$dispositivos->id]) !!}" onclick="return confirm('Are you sure wants to delete this Dispositivos?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection