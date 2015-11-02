@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Cobros</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cobros.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($cobros->isEmpty())
                <div class="well text-center">No Cobros found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Id Contrato</th>
			<th>Id Usuario</th>
			<th>Monto A Pagar</th>
			<th>Monto Pagado</th>
			<th>No Recibo</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($cobros as $cobros)
                        <tr>
                            <td>{!! $cobros->id_contrato !!}</td>
					<td>{!! $cobros->id_usuario !!}</td>
					<td>{!! $cobros->monto_a_pagar !!}</td>
					<td>{!! $cobros->monto_pagado !!}</td>
					<td>{!! $cobros->no_recibo !!}</td>
					<td>{!! $cobros->estado !!}</td>
                            <td>
                                <a href="{!! route('cobros.edit', [$cobros->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('cobros.delete', [$cobros->id]) !!}" onclick="return confirm('Are you sure wants to delete this Cobros?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection