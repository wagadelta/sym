@extends('layout.publicalayout')

@section('content')
<div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
  <!--<img src="{--{ asset('images') }--}/ad2.jpg" class="img-responsive  ads-cls"/> </img>-->
</div>
<div class="col-md-8 div-center">
  <div class="row">
    <div id="logo" class="col-md-12">
      <a href="{{asset('/') }}" >
        <img src="{{ asset('images') }}/logo.png"/>
      </a>
    </div>
    <div class="row">
      <div class="row">
          <!--<div class="col-lg-12 col-md-12 col-xs-12 banner">-->
          @if($images->isEmpty())
          <div class="well text-center color-text-b"> <h5> No hay Reultados para ésta búsqueda. </h5>
            <a href="{{asset('/')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
              Regresar al inicio</a>
            </div>
            @else

      </div>

    </div>
    <h1>Corredor: {{ $corredorData->apellidos}}, {{ $corredorData->nombres}}</h1>
    <div class="row center col-md-12">
      @foreach($images as $image)
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="{{ asset('uploads') }}/{{$image->archivo}}" class="thumbnail color-text-b"
          data-toggle="lightbox"
          data-footer="<a href='{{ asset('uploads') }}/{{$image->archivo}}'
            download='{{ $image->archivo }}'>
            <i class='fa fa-download fa-2x' title='Descargar imagen {{ $image->archivo }}'>
            </i></a> " >

            <img src="{{ asset('uploads') }}/{{$image->archivo}}"/>
          </a>
        </div>
        @endforeach
      </div>

      <div class="row center">
        <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">

        </div>

        <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8 text-center">
          {!! $images->render() !!}
        </div>

        <div class="hidden-xs col-xs-1 hidden-sm col-sm-2 col-md-2 col-lg-2">

        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="hidden-xs col-xs-2 hidden-sm col-sm-2  col-md-2 col-lg-2 ">
    <!--<img src="{--{ asset('images') }--}/ad2.jpg" class="img-responsive  ads-cls"/> </img>-->
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
