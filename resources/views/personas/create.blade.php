@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'personas.store']) !!}

        @include('personas.fields')

    {!! Form::close() !!}
</div>
@endsection
