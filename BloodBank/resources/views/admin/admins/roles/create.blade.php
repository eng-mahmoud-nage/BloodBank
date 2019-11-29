@extends('admin.dashboard')
@section('title')
    New Role
@endsection
@section('content')
            {!! Form::open(['method' => 'POST', 'action' => 'Role\RoleController@store']) !!}
                @include('admin.admins.roles.form')
                {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
@endsection


