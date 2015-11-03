@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Traslados</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('traslados.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($traslados->isEmpty())
                <div class="well text-center">No Traslados found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>User Id Anterior</th>
			<th>User Id Actual</th>
			<th>Observaciones</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($traslados as $traslados)
                        <tr>
                            <td>{!! $traslados->user_id_anterior !!}</td>
					<td>{!! $traslados->user_id_actual !!}</td>
					<td>{!! $traslados->observaciones !!}</td>
					<td>{!! $traslados->estado !!}</td>
                            <td>
                                <a href="{!! route('traslados.edit', [$traslados->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('traslados.delete', [$traslados->id]) !!}" onclick="return confirm('Are you sure wants to delete this Traslados?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection