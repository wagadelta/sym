@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"><i class="fa fa-clock-o"></i> Carreras </h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('carreras.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($carreras->isEmpty())
                <div class="well text-center">No Carreras found.</div>
            @else
            {!! $carreras->render() !!}
            
                <table class="table table-striped table-condensed">
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
                     
                    @foreach($carreras as $carrera)
                        <tr>
                            <td>{!! $carrera->nombre !!}</td>
					<td>{!! $carrera->slug !!}</td>
					<td>{!! $carrera->fecha !!}</td>
					<td><textarea row=2>{!! $carrera->descripcion !!}</textarea></td>
					<td><img src="{!! $carrera->imagen !!}" width="75" height="75"></td>
					<td>{!! $carrera->estado !!}</td>
                            <td>
                                <a href="{!! route('carreras.edit', [$carrera->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('carreras.delete', [$carrera->id]) !!}" onclick="return confirm('Are you sure wants to delete this Carreras?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $carreras->render() !!}
            @endif
        </div>
    </div>
@endsection