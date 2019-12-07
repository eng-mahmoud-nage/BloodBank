@inject('categories', "App\Category")
@extends('admin.dashboard')
@section('content')
    @section('title')
{{--        @dd(empty($record), $record->name)--}}
    @if(!empty($record) && $record->title == null)
{{--        @dd('create')--}}
        New User
        {!! Form::open(['method' => 'POST', 'action' => 'PostController@store']) !!}
    @else
{{--        @dd('update')--}}
        Edit User
        {!! Form::open(['method' => 'POST', 'action' => ['PostController@update', $record->id]]) !!}
    @endif
    @endsection
        <div class="form-group">
            {{Form::label('title', 'Title' )}}
            {{Form::text('title', $record->title, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('content', 'Content' )}}
            {{Form::textarea('content', $record->content, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('image', 'Image' )}}
            {{Form::file('image', ['class' => 'form-control'])}}
            <img style="width: 100px; height: 100px"
                 src="../../../storage/app/public/images/posts/{{$record->image}}" alt="image">
        </div>
        <div class="form-group category">
            <label for="role_list">Category</label><br>
            <div class="row">
                @foreach($categories->all() as $p)
                    <div class="col-md-3">
                        <div class="custom-radio">
                            <label>
                                <input type="radio" id="category" value="{{$p->id}}" name="category_id"
                                       @if($record->category_id == $p->id)
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

    @if(!empty($record) && $record->title == null)
        {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {{Form::submit('Add More', ['class' => 'btn btn-info'])}}
    @else
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class' => 'btn btn-info'])}}
    @endif
    {!! Form::close() !!}
@endsection
