@extends('admin.dashboard')
@section('title')
    New Users
@endsection
@section('content')
            {!! Form::open(['method' => 'POST', 'action' => 'AdminController@store']) !!}
                @include('admin.pages.clients.form')
                {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
@endsection
