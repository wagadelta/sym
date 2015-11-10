@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Carreras</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('carreras.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($carreras->isEmpty())
                <div class="well text-center">No Carreras found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Slug</th>
			<th>Fecha</th>
			<th>Descripcion</th>
			<th>Imagen</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($carreras as $carreras)
                        <tr>
                            <td>{!! $carreras->nombre !!}</td>
					<td>{!! $carreras->slug !!}</td>
					<td>{!! $carreras->fecha !!}</td>
					<td>{!! $carreras->descripcion !!}</td>
					<td>{!! $carreras->imagen !!}</td>
					<td>{!! $carreras->estado !!}</td>
                            <td>
                                <a href="{!! route('carreras.edit', [$carreras->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('carreras.delete', [$carreras->id]) !!}" onclick="return confirm('Are you sure wants to delete this Carreras?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection