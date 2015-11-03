@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($personas, ['route' => ['personas.update', $personas->id], 'method' => 'patch']) !!}

        @include('personas.fields')

    {!! Form::close() !!}
</div>
@endsection
