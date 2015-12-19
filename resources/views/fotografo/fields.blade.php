<!--- Id Fotografo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_fotografo', 'Id Fotografo:') !!}
    {!! Form::text('id_fotografo', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Etiquetador Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_etiquetador', 'Id Etiquetador:') !!}
    {!! Form::text('id_etiquetador', null, ['class' => 'form-control']) !!}
</div>

<!--- Path Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('path', 'Path:') !!}
    {!! Form::text('path', null, ['class' => 'form-control']) !!}
</div>

<!--- Archivo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('archivo', 'Archivo:') !!}
    {!! Form::text('archivo', null, ['class' => 'form-control']) !!}
</div>

<!--- Slug Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!--- Tipo Imagen Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('tipo_imagen', 'Tipo Imagen:') !!}
    {!! Form::text('tipo_imagen', null, ['class' => 'form-control']) !!}
</div>

<!--- Etiquetas Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('etiquetas', 'Etiquetas:') !!}
    {!! Form::text('etiquetas', null, ['class' => 'form-control']) !!}
</div>

<!--- Fecha Etiqueta Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fecha_etiqueta', 'Fecha Etiqueta:') !!}
    {!! Form::text('fecha_etiqueta', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Ubicacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_ubicacion', 'Id Ubicacion:') !!}
    {!! Form::text('id_ubicacion', null, ['class' => 'form-control']) !!}
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
