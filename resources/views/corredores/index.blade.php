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
                     
                    @foreach($corredores as $corredore)
                        <tr>
                            <td>{!! $corredore->nombres !!}</td>
        					<td>{!! $corredore->apellidos !!}</td>
        					<td>{!! $corredore->slug !!}</td>
        					<td>{!! $corredore->identificacion !!}</td>
        					<td>{!! $corredore->id_carrera !!}</td>
        					<td>{!! $corredore->estado !!}</td>
                            <td>
                                <a href="{!! route('corredores.edit', [$corredore->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('corredores.delete', [$corredore->id]) !!}" onclick="return confirm('Are you sure wants to delete this Corredores?')"><i class="glyphicon glyphicon-remove"></i></a>
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