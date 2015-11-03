<!--- Marca Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>

<!--- Numero Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!--- Modelo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!--- Serial Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('serial', 'Serial:') !!}
    {!! Form::text('serial', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Usuario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_usuario', 'Id Usuario:') !!}
    {!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
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
