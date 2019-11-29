@extends('admin.dashboard')
@section('content')

    {!! Form::open(['method' => 'POST', 'action' => ['Role\PermissionController@update', $record->id]]) !!}
        @include('admin.admins.permissions.form')
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class' => 'btn btn-info'])}}
    {!! Form::close() !!}

@endsection
