<!--- User Id Anterior Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_id_anterior', 'User Id Anterior:') !!}
    {!! Form::text('user_id_anterior', null, ['class' => 'form-control']) !!}
</div>

<!--- User Id Actual Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_id_actual', 'User Id Actual:') !!}
    {!! Form::text('user_id_actual', null, ['class' => 'form-control']) !!}
</div>

<!--- Observaciones Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
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
