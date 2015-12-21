@extends('layout.publicalayout')

@section('content')

<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
  <img src="{{ asset('images') }}/ad2.jpg" class="img-responsive  ads-cls"/> </img>
</div>
<div class="col-md-8 div-center">
  <div class="row">
    <div id="logo" class="col-md-12">
      <a href="{{ asset('/') }}" >
        <img src="{{ asset('images/logo.png') }}"/>
      </a>
    </div>
    <div class="row">

      <div class="col-md-12 banner">

        <img src="{{ asset('images') }}/banner.jpg" class="img-responsive internal-hiegth"/>

        <div class="col-md-8 search-internal ">
          <input type="text" class="searchinput vertical" placeholder="Busca un corredor">
          <button class="searchbutton vertical"> </button>
        </div>
      </div>
    </div>
    <h1>Corredores</h1>
    <div class="row center col-md-12">
      @foreach($images as $imagenes)
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="{{ asset('uploads') }}/{{$imagenes->archivo}}" class="thumbnail" data-toggle="lightbox">
          <img src="{{ asset('uploads') }}/{{$imagenes->archivo}}"/>

        </a>
        <p class="text-justify images-caption">{{ $imagenes->etiquetas }}</p>
      </div>
      @endforeach
    </div>
  </div>
</div>
<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
  <img src="{{ asset('images') }}/ad2.jpg" class="img-responsive  ads-cls"/> </img>
</div>







@endsection

@section('script')
<script type="text/javascript">
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
</script>
@endsection
