@extends('admin.dashboard')
@section('title')
    Edit Role
@endsection
@section('content')
    {!! Form::open(['method' => 'POST', 'action' => ['Role\RoleController@update', $record->id]]) !!}
        @include('admin.admins.roles.form')
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class' => 'btn btn-info'])}}
    {!! Form::close() !!}
@endsection
