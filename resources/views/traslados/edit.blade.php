@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($traslados, ['route' => ['traslados.update', $traslados->id], 'method' => 'patch']) !!}

        @include('traslados.fields')

    {!! Form::close() !!}
</div>
@endsection
