@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($ubicaciones, ['route' => ['ubicaciones.update', $ubicaciones->id], 'method' => 'patch']) !!}

        @include('ubicaciones.fields')

    {!! Form::close() !!}
</div>

<form action="{{ asset('image-upload') }}" class="dropzone" method="post">
  <div class="fallback" id="myId">
    <input name="file" type="file" multiple />
  </div>
</form>


@endsection

@section('script')
<script>
$("div#myId").dropzone({ url: "{{ asset('storage') }}" });
</script>
@endsection