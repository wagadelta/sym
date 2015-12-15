<!--- identificacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('identificacion', 'Identificación:') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
</div>

<!--- otraIdentificacion Nombres Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Otra-identificacion', 'Otra Identificación:') !!}
    {!! Form::text('otra_identificacion', null, ['class' => 'form-control']) !!}
</div>

<!--- Contacto email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!--- nombres Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!--- apellidos Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!--- telefonos Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefonos', 'Teléfonos:') !!}
    {!! Form::text('telefonos', null, ['class' => 'form-control']) !!}
</div>


<!--- usuario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('usuario', 'Nombre de usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Rol Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Rol', 'Rol:') !!}
    <!--{!! Form::text('id_rol', null, ['class' => 'form-control']) !!}-->
    {!! Form::select('id_rol', $rol_options , Input::old('id_rol'), ['class' => 'form-control']) !!}
</div>

<!--- Password  Clave Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Clave', 'Clave:') !!} Mínimo 6 caracteres.
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!--- Password  Confirmation ConfirmarClave Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Confirmar Clave', 'Confirmar Clave:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!--- Supervisado por Field --->
<div class="form-group col-sm-6 col-lg-4" id="idsupervisor">
    {!! Form::label('supervisado-por', 'Supervisado por:') !!}
    {!! Form::select('id_supervisor', $supervisor_options , Input::old('id_supervisor'), ['class' => 'form-control']) !!}
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>