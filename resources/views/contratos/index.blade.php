@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Contratos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('contratos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($contratos->isEmpty())
                <div class="well text-center">No Contratos found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Monto</th>
			<th>No Cuotas</th>
			<th>Valor Cuota</th>
			<th>Perido Cobro</th>
			<th>Solicitado Por</th>
			<th>Solicitado En</th>
			<th>Aprobado Por</th>
			<th>Aprobado En</th>
			<th>Entrado Por</th>
			<th>Entregado En</th>
			<th>Entregado Gps</th>
			<th>Pagado</th>
			<th>Juridico Por</th>
			<th>Juridico En</th>
			<th>Incobrable Por</th>
			<th>Incobrable En</th>
			<th>Rechazado Por</th>
			<th>Rechazado En</th>
			<th>Conyugue Lugar Trabajo</th>
			<th>Estado</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($contratos as $contratos)
                        <tr>
                            <td>{!! $contratos->monto !!}</td>
					<td>{!! $contratos->no_cuotas !!}</td>
					<td>{!! $contratos->valor_cuota !!}</td>
					<td>{!! $contratos->perido_cobro !!}</td>
					<td>{!! $contratos->solicitado_por !!}</td>
					<td>{!! $contratos->solicitado_en !!}</td>
					<td>{!! $contratos->aprobado_por !!}</td>
					<td>{!! $contratos->aprobado_en !!}</td>
					<td>{!! $contratos->entrado_por !!}</td>
					<td>{!! $contratos->entregado_en !!}</td>
					<td>{!! $contratos->entregado_gps !!}</td>
					<td>{!! $contratos->pagado !!}</td>
					<td>{!! $contratos->juridico_por !!}</td>
					<td>{!! $contratos->juridico_en !!}</td>
					<td>{!! $contratos->incobrable_por !!}</td>
					<td>{!! $contratos->incobrable_en !!}</td>
					<td>{!! $contratos->rechazado_por !!}</td>
					<td>{!! $contratos->rechazado_en !!}</td>
					<td>{!! $contratos->conyugue_lugar_trabajo !!}</td>
					<td>{!! $contratos->estado !!}</td>
                            <td>
                                <a href="{!! route('contratos.edit', [$contratos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('contratos.delete', [$contratos->id]) !!}" onclick="return confirm('Are you sure wants to delete this Contratos?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection