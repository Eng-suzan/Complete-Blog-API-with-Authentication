<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();

        $totalCategories = Category::count();

        $totalComments = Comment::count();

        $featuredPostsCount = Post::where('is_featured', true)->count();

        $recentPosts = Post::latest()   ->take(5)  ->get();
$latestComments = Comment::with('post')
    ->latest()
    ->take(5)
    ->get();
        $popularPosts = Post::withCount('comments') ->orderByDesc('comments_count') ->take(5)->get();

        return view('dashboard.index', compact(
            'totalPosts',
            'totalCategories',
            'totalComments',
            'featuredPostsCount',
            'recentPosts',
            'latestComments',
            'popularPosts'
        ));
    }
}