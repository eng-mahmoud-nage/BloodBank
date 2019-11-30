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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $records = Post::all();
        $records = $this->filter($records, $request);
        return view('admin/pages/posts.all', compact('records'));
    }

    protected function filter($record, Request $request){
        if ($request->has('search') && $request->input('search') != ""){
            return Post::where(['title' => $request->input('search')])->get();
        }
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $record = new Post();
        return view('admin.pages.posts.createOrUpdate', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')){
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
        if ($id != null){
            //dd($id);
            $records = Category::find($id)->posts;}
        else
            $records = Post::all();
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
        $record = Post::find($id);
        return view('admin.pages.posts.createOrUpdate', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $request->validate([
            'title' => 'required|unique:posts,title,'.$id,
            'content' => 'required'
        ]);

        Post::find($id)->update($request->except('image', 'user_id'));
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
