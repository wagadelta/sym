@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'contratos.store']) !!}

        @include('contratos.fields')

    {!! Form::close() !!}
</div>
@endsection
