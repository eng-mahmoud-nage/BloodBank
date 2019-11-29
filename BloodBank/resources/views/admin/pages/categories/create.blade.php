@extends('admin.dashboard')
@section('title')
    New Category
@endsection
@section('content')

    {!! Form::open(['method' => 'POST', 'action' => 'CategoryController@store']) !!}

    <div class="form-group">
        {{Form::label('name', 'name' )}}
        {{Form::text('name', '', ['class' => 'form-control'])}}
    </div>

    {{Form::submit('Create', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection
