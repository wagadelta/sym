@extends('fotografo')

@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
            <h1 class="pull-left"> <i class="fa fa-picture-o"></i> Imagenes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('imagenes.create') !!}">Agregar imagenes</a>
        </div>
		{!! Form::open(array(
                        'url' => 'imagen/upload',
                        'files' => 'true',
                        'class'  =>  'dropzone',
                        'id'	=> 'my-dropzone',
                        'method' => 'post'
				    ))
	!!}    
        
        <div class="row">
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('Carrera', 'Carrera:') !!}
                <select name="carrera" id="carrera" class="form-control">
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('Código de Fotógrafo', 'Código de Fotógrafo:') !!}
                {!! Form::text('show_id_fotografo',  \Auth::user()->id , ['class' => 'form-control', 'disabled' => 'disabled'] ) !!}
                <input type="hidden" name="id_fotografo" id="id_fotografo" value="{!! \Auth::user()->id !!}">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('Ubicación', 'Ubicación:') !!}
                <select name="ubicacion" id="ubicacion" class="form-control">
                </select>
            </div>
        </div>

        <div class="row">
            <div class="dz-message">
            	Arrastra tus imagenes aqui
            </div>
            
            <div class="dropzone-previews"></div>
            
            <div class="panel-body" style="width:80%">
        	<div id="template">

            <button type="submit" class="btn btn-success" id="submit-all">Enviar</button>                            
	{!! Form::close() !!}


              <!--<div class="fallback" id="myId">-->
              <!--  <input name="file" type="file" multiple />-->
              <!--</div>-->
       </div>
    </div>

@endsection


@section('script')
<script type="text/javascript">
Dropzone.options.myDropzone={
        autoProcessQueue: true,
    };
    
$(document).ready(function(){
    //$("div#myId").dropzone({ url: "/public/uploads" });
    
    
    $("select#carrera").change(function(){    
        var carrera = $('#carrera').val();
        $('#ubicacion').empty();

        $.get( "{{asset('/getUbicaciones')}}/"+carrera )
            .done(function( data ) {
                $.each(data, function (i, item) {
                    $('#ubicacion').append($('<option>', { 
                        value: item.id,
                        text : item.nombre 
                    }));
                });
                }
            );
    });//carrrera on change
});
</script>
@endsection