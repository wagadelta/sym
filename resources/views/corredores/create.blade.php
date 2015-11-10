@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'corredores.store']) !!}

        @include('corredores.fields')

    {!! Form::close() !!}
</div>
@endsection
