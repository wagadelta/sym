@extends('etiquetador')

@section('content')
        @if(Session::has('empty'))
        <div class="container">
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                NO EXISTEN FOTOGRAFIAS PARA ESTA CARRERA.
            </div>
        </div>

        @else

    {!! Form::model($image, ['url' => ['imagenes/etiquetar', $image->id], 'method' => 'post']) !!}
    <link href="{{ asset('/css/magnifier.css') }}" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <h1 class="pull-left"><i class="fa fa-clock-o"></i>Ingrese etiquetas</h1>
        </div>

        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6>
                        <a class="magnifier-thumb-wrapper" href="#">
                            <img id="thumb" src="/uploads/{!! $image->archivo !!}" width="452" height="340">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="magnifier-preview" id="preview" style="width: 400px; height: 233px; text-align:center;">
                            Use el scroll del mouse para <br>agrandar el area.
                        </div>
                    </div>

                    <!--<div>-->
                    <!--    <a class="magnifier-thumb-wrapper" href="#">-->
                    <!--        <img id="thumb" src="/uploads/{!! $image->archivo !!}"-->
                    <!--        data-large-img-url="/uploads/{!! $image->archivo !!}"-->
                    <!--        data-large-img-wrapper="preview">-->
                    <!--    </a>-->
                    <!--    <div class="magnifier-preview" id="preview" style="width: 200px; height: 133px">Use el mouse para <br>agrandar el area.</div>-->
                    <!--</div>-->
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div>
                        <div class="strong">
                            Nombre de archivo: {!! $image->archivo !!}
                            <?php
                                if($image->is_blocked == '1'){
                                    echo ' - Bloqueada a otros usuarios. ';
                                }
                            ?>
                        </div>
                    <br>
                    {!! Form::label('Etiquetas', 'Etiquetas:') !!}
                    {!! Form::textarea('etiquetas', $etiquetasString, ['class' => 'form-control','size' => '30x2', 'autofocus']) !!}
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    {!! Form::submit('Etiquetar', ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>


    </div>
    {!! Form::hidden('etiquetas_original', $image->etiquetas) !!}
    {!! Form::hidden('carreraId', $carreraId) !!}
    {!! Form::hidden('etiquetadorId', $etiquetadorId) !!}
    {!! Form::close() !!}

    @endif
@endsection

@section('script')
<script src="{{ asset('/dropzone/dropzone.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/Event.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Magnifier.js') }}"></script>
    <script type="text/javascript">
        var evt = new Event(),
        m = new Magnifier(evt);
        m.attach({
            thumb: '#thumb',
            large: "{{ asset('uploads') }}/{!! $image->archivo !!}",
            largeWrapper: 'preview',
            mode: 'outside',
            zoom: 8,
            zoomable: true
        });
    </script>
@endsection
