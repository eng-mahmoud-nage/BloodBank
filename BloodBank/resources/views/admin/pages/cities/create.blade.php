@inject('gov', "App\Governorate")
@extends('admin.dashboard')
@section('title')
    New City
@endsection
@section('content')

    {!! Form::open(['method' => 'POST', 'action' => 'CityController@store']) !!}

    <div class="form-group">
        {{Form::label('name', 'name' )}}
        {{Form::text('name', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('', 'Category' )}}
        {{Form::select('governorate', $gov->all('name'))}}
    </div>

    {{Form::submit('Create', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection
