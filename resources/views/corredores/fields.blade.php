<!--- Nombres Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!--- Apellidos Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!--- Slug Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!--- Identificacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('bib_number', 'BIB Number:') !!}
    {!! Form::text('bib_number', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Carrera Field --->
<!--<div class="form-group col-sm-6 col-lg-4">
    {--!! Form::label('id_carrera', 'Id Carrera:') !!--}
    {--!! Form::text('id_carrera', null, ['class' => 'form-control']) !!--}
</div>-->

<div class="form-group col-sm-6 col-lg-4">
  {!! Form::label('id_carrera', 'Carrera:') !!}
  {!! Form::select('id_carrera', $carreras_options, Input::old('id_carrera'), ['class' => 'form-control']) !!}
</div>

<!--- Id Carrera Field --->
<!--<div class="form-group col-sm-6 col-lg-4">
    {--!! Form::label('etiquetado', 'Tiene Imágenes:') !!--}
    {--!! Form::text('etiquetado', null, ['class' => 'form-control']) !!--}
</div>-->

<!--- Estado Field --->
<!-- <div class="form-group col-sm-6 col-lg-4">
    {--!! Form::label('estado', 'Estado:') !!--}
    {--!! Form::text('estado', null, ['class' => 'form-control']) !!--}
</div> -->


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
