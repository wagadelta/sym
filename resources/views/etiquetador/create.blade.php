@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'imagenes.store']) !!}

        @include('imagenes.fields')

    {!! Form::close() !!}
</div>
@endsection
