@extends('admin.dashboard')
@section('title')
    Edit Governorates
@endsection
@section('content')

    {!! Form::open(['method' => 'POST', 'action' => ['GovernorateController@update', $record->id]]) !!}
        <div class="form-group">
            {{Form::label('name', 'Name' )}}
            {{Form::text('name', $record->name, ['class' => 'form-control'])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class' => 'btn btn-info'])}}
    {!! Form::close() !!}

@endsection
