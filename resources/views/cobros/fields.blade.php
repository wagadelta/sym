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

<!--- Monto A Pagar Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('monto_a_pagar', 'Monto A Pagar:') !!}
    {!! Form::text('monto_a_pagar', null, ['class' => 'form-control']) !!}
</div>

<!--- Monto Pagado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('monto_pagado', 'Monto Pagado:') !!}
    {!! Form::text('monto_pagado', null, ['class' => 'form-control']) !!}
</div>

<!--- No Recibo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('no_recibo', 'No Recibo:') !!}
    {!! Form::text('no_recibo', null, ['class' => 'form-control']) !!}
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
