@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left"> <i class="fa fa-level-up"></i> Roles</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('roles.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($roles->isEmpty())
                <div class="well text-center">No Roles found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Descripcion</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($roles as $roles)
                        <tr>
                            <td>{!! $roles->descripcion !!}</td>
                            <td>
                                <a href="{!! route('roles.edit', [$roles->id]) !!}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{!! route('roles.delete', [$roles->id]) !!}" onclick="return confirm('Está seguro de eliminar éste registro - Roles?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection