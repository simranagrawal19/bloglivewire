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

    // public function store()
    // {
      
    //     $attributes = request()->validate([
    //         'title' => 'required',
    //         'thumbnail' => 'required|image',
    //         'slug' => ['required', Rule::unique('posts', 'slug')],
    //         'excerpt' => 'required',
    //         'body' => 'required',
    //         'category_id' => ['required', Rule::exists('categories', 'id')],
    //     ]);
    //     $attributes['user_id'] = auth()->id();
    //     $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    //     Post::create($attributes);
    //     return redirect('/');
    // }

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

    // public function update(Post $post)
    // {
    //     $attributes = request()->validate([
    //         'title' => 'required',
    //         'thumbnail' => 'required|image',
    //         'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
    //         'excerpt' => 'required',
    //         'body' => 'required',
    //         'category_id' => ['required', Rule::exists('categories', 'id')],

    //     ]);

    //     $post->update($attributes);
        
    //     return redirect('/')->with('success', 'Post Updated');

    // }

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
        // dd(request()->all());
        // $todayDate = Carbon::now()->format('Y-m-d');
        // $data = request()->all();
        
        return $dataTable->render('admin/posts.table');

        

    }

    public function show(Request $request, $id)
    {
        $post = Post::find($id);
        return view('admin/posts.show', ['post' => $post]);
        
    }
    
    // public function filter(Request $request)
    // {
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;

    //     $post = Post::whereDate('created_at', '>=', $start_date)
    //         ->whereDate('created_at', '<=', $end_date)
    //         ->get();
    //         return view('admin/posts.table', compact(['post']));
    // }

}
