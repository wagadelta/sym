@extends('layout.publicalayout')

@section('content')

<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
  <!--<img src="{--{ asset('images') }--}/ad2.jpg" class="img-responsive  ads-cls"/> </img>-->
</div>
<div class="col-md-8 div-center">
  <div class="row">
    <div id="logo" class="col-lg-8 col-md-8 col-xs-6">
      <a href="{{ asset('/') }}" >
        <img src="{{ asset('images/logo.png') }}">
      </a>
    </div>
    <div id="logo" class="col-lg-2 col-md-2 col-xs-6">
      <a href="#" >
        <!--Registro-->
      </a>
      <!--|-->
      <a href="#" >
        <!--Ingresar-->
      </a>

    </div>

    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 div-center">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 search-internal-slide">

        <div class="input-group searchinput">

          <input type="text" class=" vertical form-control color-text-g" name="quest" id="qry" placeholder="Nombres, o Apellidos, o Número" >
          <!--<input type="hidden" name="oculto" id="{{$id}}"/>-->
          <span class="input-group-btn goSearch">
            <button class="btn btn-primary vertical-correc"  id="goSearch" type="submit"><i class="fa fa-search fa-x5"></i> Buscar</button>
          </span>

        </div>


        <!--div class="col-lg-8 col-md-8 col-xs-8 search-internal ">

      </div>-->
    </div>
  </div>
  <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
    @if($allImgsRun->isEmpty())
    <div class="well text-center color-text-b"> <h5> No hay resultados para ésta búsqueda. </h5>
      <a href="{{asset('/')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>Regresar al inicio</a>
    </div>

    @else
    <div class="container">
      <h2>{{ $name }}</h2>
    </div>
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
      @foreach($allImgsRun as $image)
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
        <div>
          <a href="{{ asset('uploads') }}/{{$image->archivo}}" class="thumbnail color-text-b"
            data-toggle="lightbox"
            data-footer="<a href='{{ asset('uploads') }}/{{$image->archivo}}'
              download='{{ $image->archivo }}'>
              <i class='fa fa-download fa-2x' title='Descargar imagen {{ $image->archivo }}'>
              </i></a> " >

              <img src="{{ asset('/uploads')}}/{{$image->archivo}}"/>
            </a>

          </div>
        </div>
        @endforeach

      </div>
      @endif
    </div>

    <div class="row center">
      <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">

      </div>

      <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8 text-center">
        {!! $allImgsRun->render() !!}
      </div>

      <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">

      </div>
    </div>

  </div>
</div>
<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
  <!--<img src="{--{ asset('images') }--}/ad2.jpg" class="img-responsive  ads-cls"/> </img>-->
</div>


@endsection


@section('script')

<script type="text/javascript">


jQuery(document).ready(function($) {

  $('#qry').on('keypress', function(e){
    if(e.keyCode == 13){
      if($('#qry').val().length >= 1){
        var searchUrl = 'http://' + document.location.hostname +'/fotos/corredores-imagenes/{{ $id }}/'+$('#qry').val();
        //alert(searchUrl);
        window.location.href = searchUrl;
        return true;
      }else{
        var searchUrl = 'http://' + document.location.hostname +'/fotos/carrera/{{$id}}/';

        alert('No se puede procesar la solicitud el campo no puede estar vacío');
        return false;
      }
    }
  });// onchange

  $('#goSearch').on('click', function(e){
    if($('#qry').val().length >= 1){
      var searchUrl = 'http://' + document.location.hostname +'/fotos/corredores-imagenes/{{ $id }}/'+$('#qry').val();
      //alert(searchUrl);
      window.location.href = searchUrl;
      return true;
    }else{
      var searchUrl = 'http://' + document.location.hostname +'/fotos/carrera/{{$id}}/';

      alert('No se puede procesar la solicitud el campo no puede estar vacío');
      return false;
    }

  });// onchange

});// jQuery

$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
  event.preventDefault();

  $(this).ekkoLightbox();


});
</script>
@endsection
