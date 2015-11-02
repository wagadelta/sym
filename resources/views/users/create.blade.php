@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'users.store']) !!}

        @include('users.fields')

    {!! Form::close() !!}
</div>
@endsection

@section('script')
<script>
     jQuery(document).ready(function($) {
        $('select[name="id_rol"]').val(3);
        
        $('select[name="id_rol"]').on('change', function(e){
            if($('select[name="id_rol"]').val()==3) // si es rol Cobrador
            {
                $("#idsupervisor").removeAttr('disabled');
            }else{
                $("#idsupervisor").attr('disabled', 'disabled');
                $("#idsupervisor").val(0);
            }
            
        });
        

     });
</script>
@endsection