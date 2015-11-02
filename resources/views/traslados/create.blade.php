@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'traslados.store']) !!}

        @include('traslados.fields')

    {!! Form::close() !!}
</div>
@endsection
