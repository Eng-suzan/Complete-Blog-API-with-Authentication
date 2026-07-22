<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;


use Illuminate\Http\Request;

class PostController extends Controller
{
   public function create()
{
    $categories = Category::all();
    $users = User::all();

    return view('posts.create', compact('categories', 'users'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|min:3',
        'content' => 'required',
        'user_id' => 'required',
        'is_featured' => 'boolean',
        'category_id' => 'required|array',
        'category_id.*' => 'exists:categories,id',

    ]);

    $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => $request->user_id,
        'is_featured' => $request->has('is_featured'),
    ]);

    $post->categories()->sync($request->category_id);

    return redirect()->route('posts.index')
        ->with('success','Post created successfully');
}
public function index(Request $request)
{
    
    $query = Post::with(['user','categories','comments']);

    if ($request->search) {
        $query->search($request->search);
    }

    $featuredPosts = Post::where('is_featured', true)   ->get();
 $recentPosts = Post::latest()->take(5)->get();
 $latestComments = Comment::latest()  ->take(5)     ->get();
    $posts = $query->paginate(10);

    return view('posts.index', compact('posts', 'featuredPosts', 'recentPosts', 'latestComments'));
}
public function edit(Post $post)
{
    $categories = Category::all();
    $users = User::all();

    return view('posts.edit', compact('post', 'categories', 'users'));
}
public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'user_id' => 'required',
        'is_featured' => 'boolean',
    'category_id' => 'required|array',
'category_id.*' => 'exists:categories,id',

    ]);
    
   

    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => $request->user_id,
        'is_featured' => $request->has('is_featured'),
    ]);

    $post->categories()->sync($request->category_id);

    return redirect()->route('posts.index')
        ->with('success','Post updated successfully');
}
public function show(Post $post)
{
     $comments = $post->comments()   ->latest() ->paginate(1);
    $post->load(['user', 'categories']);
    return view('posts.show', compact('post', 'comments'));
}
public function destroy(Post $post)
{
    $post->categories()->detach();
    $post->delete();

    return redirect()->route('posts.index')
        ->with('success','Post deleted successfully');
}
}