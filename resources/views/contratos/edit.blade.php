@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($contratos, ['route' => ['contratos.update', $contratos->id], 'method' => 'patch']) !!}

        @include('contratos.fields')

    {!! Form::close() !!}
</div>
@endsection
