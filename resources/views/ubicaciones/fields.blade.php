<!--- Id Carrera Field --->
<!--<div class="form-group col-sm-6 col-lg-4">
    {--!! Form::label('id_carrera', 'Id Carrera:') !!--}
    {--!! Form::text('id_carrera', null, ['class' => 'form-control']) !!--}
</div>-->


<div class="form-group col-sm-6 col-lg-4">
  {!! Form::label('id_carrera', 'Carrera:') !!}
  {!! Form::select('id_carrera', $carreras_options, Input::old('id_carrera'), ['class' => 'form-control']) !!}
</div>

<!--- Nombre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Slug Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!--- Direccion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!--- Geolocalizacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('geolocalizacion', 'Geolocalizacion:') !!}
    {!! Form::text('geolocalizacion', null, ['class' => 'form-control']) !!}
</div>

<!--- Estado Field --->
<!-- <div class="form-group col-sm-6 col-lg-4">
    {--!! Form::label('estado', 'Estado:') !!--}
    {--!! Form::text('estado', null, ['class' => 'form-control']) !!--}
</div>-->


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
