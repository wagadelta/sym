<!--- Id Contrato Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_contrato', 'Id Contrato:') !!}
    {!! Form::text('id_contrato', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Usuario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_usuario', 'Id Usuario:') !!}
    {!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
</div>

<!--- Fecha Pago Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fecha_pago', 'Fecha Pago:') !!}
    {!! Form::text('fecha_pago', null, ['class' => 'form-control']) !!}
</div>

<!--- Cuotas A Pagar Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('cuotas_a_pagar', 'Cuotas A Pagar:') !!}
    {!! Form::text('cuotas_a_pagar', null, ['class' => 'form-control']) !!}
</div>

<!--- Cuotas Pagadas Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('cuotas_pagadas', 'Cuotas Pagadas:') !!}
    {!! Form::text('cuotas_pagadas', null, ['class' => 'form-control']) !!}
</div>

<!--- No Recibo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('no_recibo', 'No Recibo:') !!}
    {!! Form::text('no_recibo', null, ['class' => 'form-control']) !!}
</div>

<!--- No Aviso Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('no_aviso', 'No Aviso:') !!}
    {!! Form::text('no_aviso', null, ['class' => 'form-control']) !!}
</div>

<!--- Estado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
