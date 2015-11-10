@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"> <i class="fa fa-child"></i> Corredores</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('corredores.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($corredores->isEmpty())
                <div class="well text-center">No Corredores found.</div>
            @else
            {!! $corredores->render() !!}
                <table class="table table-striped table-condensed">
                    <thead>
                    <th>Nombres</th>
			<th>Apellidos</th>
			<th>Slug</th>
			<th>Identificacion</th>
			<th>Id Carrera</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($corredores as $corredor)
                        <tr>
                            <td>{!! $corredor->nombres !!}</td>
        					<td>{!! $corredor->apellidos !!}</td>
        					<td>{!! $corredor->slug !!}</td>
        					<td>{!! $corredor->identificacion !!}</td>
        					<td>{!! $corredor->id_carrera !!}</td>
        					<td>{!! $corredor->estado !!}</td>
                            <td>
                                <a href="{!! route('corredores.edit', [$corredor->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('corredores.delete', [$corredor->id]) !!}" onclick="return confirm('Are you sure wants to delete this Corredores?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $corredores->render() !!}
            @endif
        </div>
    </div>
@endsection