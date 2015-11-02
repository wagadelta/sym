<!--- Monto Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', null, ['class' => 'form-control']) !!}
</div>

<!--- No Cuotas Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('no_cuotas', 'No Cuotas:') !!}
    {!! Form::text('no_cuotas', null, ['class' => 'form-control']) !!}
</div>

<!--- Valor Cuota Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('valor_cuota', 'Valor Cuota:') !!}
    {!! Form::text('valor_cuota', null, ['class' => 'form-control']) !!}
</div>

<!--- Perido Cobro Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('perido_cobro', 'Perido Cobro:') !!}
    {!! Form::text('perido_cobro', null, ['class' => 'form-control']) !!}
</div>

<!--- Solicitado Por Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('solicitado_por', 'Solicitado Por:') !!}
    {!! Form::text('solicitado_por', null, ['class' => 'form-control']) !!}
</div>

<!--- Solicitado En Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('solicitado_en', 'Solicitado En:') !!}
    {!! Form::text('solicitado_en', null, ['class' => 'form-control']) !!}
</div>

<!--- Aprobado Por Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('aprobado_por', 'Aprobado Por:') !!}
    {!! Form::text('aprobado_por', null, ['class' => 'form-control']) !!}
</div>

<!--- Aprobado En Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('aprobado_en', 'Aprobado En:') !!}
    {!! Form::text('aprobado_en', null, ['class' => 'form-control']) !!}
</div>

<!--- Entrado Por Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('entrado_por', 'Entrado Por:') !!}
    {!! Form::text('entrado_por', null, ['class' => 'form-control']) !!}
</div>

<!--- Entregado En Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('entregado_en', 'Entregado En:') !!}
    {!! Form::text('entregado_en', null, ['class' => 'form-control']) !!}
</div>

<!--- Entregado Gps Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('entregado_gps', 'Entregado Gps:') !!}
    {!! Form::text('entregado_gps', null, ['class' => 'form-control']) !!}
</div>

<!--- Pagado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pagado', 'Pagado:') !!}
    {!! Form::text('pagado', null, ['class' => 'form-control']) !!}
</div>

<!--- Juridico Por Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('juridico_por', 'Juridico Por:') !!}
    {!! Form::text('juridico_por', null, ['class' => 'form-control']) !!}
</div>

<!--- Juridico En Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('juridico_en', 'Juridico En:') !!}
    {!! Form::text('juridico_en', null, ['class' => 'form-control']) !!}
</div>

<!--- Incobrable Por Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('incobrable_por', 'Incobrable Por:') !!}
    {!! Form::text('incobrable_por', null, ['class' => 'form-control']) !!}
</div>

<!--- Incobrable En Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('incobrable_en', 'Incobrable En:') !!}
    {!! Form::text('incobrable_en', null, ['class' => 'form-control']) !!}
</div>

<!--- Rechazado Por Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rechazado_por', 'Rechazado Por:') !!}
    {!! Form::text('rechazado_por', null, ['class' => 'form-control']) !!}
</div>

<!--- Rechazado En Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rechazado_en', 'Rechazado En:') !!}
    {!! Form::text('rechazado_en', null, ['class' => 'form-control']) !!}
</div>

<!--- Conyugue Lugar Trabajo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('conyugue_lugar_trabajo', 'Conyugue Lugar Trabajo:') !!}
    {!! Form::text('conyugue_lugar_trabajo', null, ['class' => 'form-control']) !!}
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
