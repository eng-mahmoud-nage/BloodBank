<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $records = Post::all();
        return view('admin/pages/posts.all', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($request->hasFile('cover_image')){
            dd('true');
        }else{
            $imageToStore = 'general.jpg';
        }

        $c = Post::create($request->except('user_id', 'image'));
        $c->user_id = auth()->user()->id;
        $c->image = $imageToStore;
        $c->save();
        return redirect(url(route('post.index')))->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $records = Category::find($id)->posts;
        return view('admin/pages/posts.all', compact('records', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $record = Post::find($id)->load('category');
        return view('admin/pages/posts.edit')->with(['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        Post::find($id)->update($request->except('image', 'category_id'));
        return redirect(url(route('post.index')))->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect(url(route('post.index')))->with('warning', 'Post Deleted');
    }


}

?>
