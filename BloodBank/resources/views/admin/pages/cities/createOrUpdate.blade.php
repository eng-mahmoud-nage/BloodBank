@inject('governorates', "App\Governorate")
@extends('admin.dashboard')
@section('content')
    @section('title')
{{--        @dd(empty($record), $record->name)--}}
    @if(!empty($record) && $record->name == null)
{{--        @dd('create')--}}
        New User
        {!! Form::open(['method' => 'POST', 'action' => 'CityController@store']) !!}
    @else
{{--        @dd('update')--}}
        Edit User
        {!! Form::open(['method' => 'POST', 'action' => ['CityController@update', $record->id]]) !!}
    @endif
    @endsection
        <div class="form-group">
            {{Form::label('name', 'Name' )}}
            {{Form::text('name', $record->name, ['class' => 'form-control'])}}
        </div>
        <div class="form-group category">
            <label for="governorate_id">Governorate</label><br>
            <div class="row">
                @foreach($governorates->all() as $p)
                    <div class="col-md-3">
                        <div class="custom-radio">
                            <label>
                                <input type="radio" id="governorate_id" value="{{$p->id}}" name="governorate_id"
                                       @if($record->governorate_id == $p->id)
                                       checked
                                    @endif
                                >
                                {{$p->name}}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @if(!empty($record) && $record->name == null)
        {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {{Form::submit('Add More', ['class' => 'btn btn-info'])}}
    @else
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class' => 'btn btn-info'])}}
    @endif
    {!! Form::close() !!}
@endsection
