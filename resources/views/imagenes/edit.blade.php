@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($imagenes, ['route' => ['imagenes.update', $imagenes->id], 'method' => 'patch']) !!}

        @include('imagenes.fields')

    {!! Form::close() !!}
</div>
@endsection
