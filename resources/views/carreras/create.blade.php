@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'carreras.store']) !!}

        @include('carreras.fields')

    {!! Form::close() !!}
</div>
@endsection
