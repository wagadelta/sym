@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($corredores, ['route' => ['corredores.update', $corredores->id], 'method' => 'patch']) !!}

        @include('corredores.fields')

    {!! Form::close() !!}
</div>
@endsection
