@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($carreras, ['route' => ['carreras.update', $carreras->id], 'method' => 'patch']) !!}

        @include('carreras.fields')

    {!! Form::close() !!}
</div>
@endsection
