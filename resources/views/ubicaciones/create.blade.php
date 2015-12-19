@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'ubicaciones.store']) !!}

        @include('ubicaciones.fields')

    {!! Form::close() !!}
</div>
@endsection
