<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function categories(){
        $record = Category::all();
        return ResponseJson(1, 'categories', ['record' => $record]);
    }

    public function post(Request $request){
        $validator = validator()->make($request->all(), [
            'id' => 'exists:posts'
        ]);
        if ($validator->fails()){
            return ResponseJson(0, $validator->errors()->first());
        }
        $record = Post::find($request->id);
        return ResponseJson(1, 'post', ['record' => $record]);
    }

    public function posts(Request $request){
        $validator = validator()->make($request->all(), [
            'category_id' => 'exists:posts'
        ]);
        if ($validator->fails()){
            return ResponseJson(0, $validator->errors()->first());
        }

        if ($request->has('category_id')) {
            $record = Post::where('category_id', $request->category_id)
                ->get()->load('category');
        }else
                $record = Post::
                orderBy(
                    $request->has('sort_by')
                        ?$request->sort_by
                        :'id',
                    $request->has('sort')
                        ?$request->sort:
                        'asc')
                    ->get()->load('category');

        return ResponseJson(1, 'posts', ['record' => $record]);
    }
}
