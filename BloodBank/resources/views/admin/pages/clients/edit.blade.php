@extends('admin.dashboard')
@section('title')
   Edit User
@endsection
@section('content')
    {!! Form::open(['method' => 'POST', 'action' => ['AdminController@update', $record->id]]) !!}
        @include('admin.pages.clients.form')
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class' => 'btn btn-info'])}}
    {!! Form::close() !!}
@endsection
