@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($userdata, ['route' => ['users.update', $userdata->id], 'method' => 'patch']) !!}

        @include('users.fields')

    {!! Form::close() !!}
</div>
@endsection

@section('script')
<script>
     jQuery(document).ready(function($) {
        if($('select[name="id_rol"]').val()!=3) // si es NO ES Cobrador
            {
                $('select[name="id_supervisor"]').val(0); // NA
            };
        
        $('select[name="id_rol"]').on('change', function(e){
            if($('select[name="id_rol"]').val()!=3) // si no es rol Cobrador
            {
                $('select[name="id_supervisor"]').val(0); //NA
            };
        });// onchange
            
         $('select[name="id_supervisor"]').on('change', function(e){
            if($('select[name="id_rol"]').val()!=3) // si No es rol Cobrador
            {
                $('select[name="id_supervisor"]').val(0); //NA
            };
         });// onchange
            
    });// jQuery
</script>
@endsection