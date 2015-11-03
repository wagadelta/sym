@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($cobros, ['route' => ['cobros.update', $cobros->id], 'method' => 'patch']) !!}

        @include('cobros.fields')

    {!! Form::close() !!}
</div>
@endsection
