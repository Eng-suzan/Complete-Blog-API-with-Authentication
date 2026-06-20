<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Post::with(['user','category']);

    // Search
    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $posts = $query->paginate(1);

    return view('posts.index', compact('posts'));
}
public function create()
{
    $categories = Category::all();
    $users = User::all();
    return view('posts.create', compact('categories', 'users'));
}

    public function store(Request $request)
{ $request->validate([
        'title' => 'required|min:3',
        'content' => 'required',
        'user_id' => 'required',
        'category_id' => 'required'
    ]);
    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => $request->user_id,
        'category_id' => $request->category_id,
        
    ]);

    return redirect()->route('posts.index')
        ->with('success','Post created successfully');
}
public function edit(Post $post)
{
    $users = User::all();
    $categories = Category::all();

    return view('posts.edit', compact('post','users','categories'));
}
public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'user_id' => 'required',
        'category_id' => 'required'
    ]);

    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => $request->user_id,
        'category_id' => $request->category_id
    ]);

    return redirect()->route('posts.index')
        ->with('success','Post updated successfully');
}
public function destroy(Post $post)
{
    $post->delete();

    return redirect()->route('posts.index')
        ->with('success','Post deleted successfully');
}
}