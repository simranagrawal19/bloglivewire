<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\DataTables\PostDataTable;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Requests\Posts\StorePostRequest;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

class AdminPostController extends Controller
{
  
    public function index()
    {
        return view('admin/posts.index', [
        'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {

        return view('admin/posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->category_id = $request->category_id;
        $post->thumbnail = $request->thumbnail;
        $post->save();
        return redirect('/');
    }

    public function edit(Post $post)
    {
        $post = Post::find($post->id);
        return view('admin/posts.edit', ['post' => $post]);
    }

    public function update(UpdateRequest $request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->thumbnail = $request->thumbnail;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->update();
        return redirect('/')->with('success', 'Post Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted');
    }

    public function table(PostDataTable $dataTable)
    {

        return $dataTable->render('admin/posts.table');

    }

    public function show(Request $request, $id)
    {
        $post = Post::find($id);
        return view('admin/posts.show', ['post' => $post]);
        
    }

}
