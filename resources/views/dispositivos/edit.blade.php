@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($dispositivos, ['route' => ['dispositivos.update', $dispositivos->id], 'method' => 'patch']) !!}

        @include('dispositivos.fields')

    {!! Form::close() !!}
</div>
@endsection
