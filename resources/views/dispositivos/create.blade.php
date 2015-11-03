@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'dispositivos.store']) !!}

        @include('dispositivos.fields')

    {!! Form::close() !!}
</div>
@endsection
