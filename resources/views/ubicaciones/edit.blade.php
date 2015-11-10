@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($ubicaciones, ['route' => ['ubicaciones.update', $ubicaciones->id], 'method' => 'patch']) !!}

        @include('ubicaciones.fields')

    {!! Form::close() !!}
</div>
@endsection
