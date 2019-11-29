@extends('admin.dashboard')
@section('title')
    New Permissions
@endsection
@section('content')
            {!! Form::open(['method' => 'POST', 'action' => 'Role\PermissionController@store']) !!}
                @include('admin.admins.permissions.form')
                {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
@endsection
