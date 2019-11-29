@inject('categories', "App\Category")
@section('title')
   Edit Posts
@endsection
@extends('admin.dashboard')
@section('content')

    {!! Form::open(['method' => 'POST', 'action' => ['PostController@update', $record->id]]) !!}
    <div class="form-group">
        {{Form::label('title', 'Title' )}}
        {{Form::text('title', $record->title, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('content', 'Content' )}}
        {{Form::text('content', $record->content, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('image', 'Image' )}}
        {{Form::file('image', ['class' => 'form-control'])}}
        <img style="width: 100px; height: 100px"
             src="../../../storage/app/public/images/posts/{{$record->image}}" alt="image">
    </div>
    <div style="border-radius: 1px " class="form-group">
        {{Form::label('', 'Category: ' )}}
        {{Form::select('category_id', $categories->pluck('name', 'id'))}}
        {{Form::label('category', $record->category->name,
            ['style' => 'margin-left:20px;
            box-shadow: -2px -3px #888 inset;
            width: 100px;
            height: 30px;
            text-align: center;'])}}
    </div>


        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class' => 'btn btn-info'])}}
    {!! Form::close() !!}

@endsection
