@extends('admin.dashboard')
@section('title')
    New Governorates
@endsection
@section('content')

    {!! Form::open(['method' => 'POST', 'action' => 'GovernorateController@store']) !!}

    <div class="form-group">
        {{Form::label('name', 'name' )}}
        {{Form::text('name', '', ['class' => 'form-control'])}}
    </div>

    {{Form::submit('Create', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection
