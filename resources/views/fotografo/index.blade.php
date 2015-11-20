@extends('fotografo')

@section('content')

<?php echo ' vista de etiquetador '; ?>
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"> <i class="fa fa-picture-o"></i> Imagenes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('imagenes.create') !!}">Add New</a>
        </div>

        <div class="row">
           <form action="/image-upload" class="dropzone" method="post">
              <div class="fallback" id="myId">
                <input name="file" type="file" multiple />
              </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
<script>
$("div#myId").dropzone({ url: "/storage" });
</script>
@endsection