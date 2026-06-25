@extends('layouts.app_layout')

@section('title', 'Dashboard')

@section('content')

<h2>Dashboard</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Posts</h5>
                <h3>{{ $totalPosts }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Categories</h5>
                <h3>{{ $totalCategories }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Comments</h5>
                <h3>{{ $totalComments }}</h3>
            </div>
        </div>
    </div>
  
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Featured Posts</h5>
                <h3>{{ $featuredPostsCount }}</h3>
            </div>
        </div>
    </div>
  <h4>Recent Posts</h4>

<ul>
@foreach($recentPosts as $post)
    <li>{{ $post->title }}</li>
@endforeach
</ul>
<h4>Latest Comments</h4>

<ul>
@foreach($latestComments as $comment)
<li>
    {{ $comment->author_name }} :
    {{ Str::limit($comment->content, 30) }}

    <a href="{{ route('posts.show', $comment->post->id) }}">
        View Post
    </a>
</li>
@endforeach
</ul>
<h4>Popular Posts</h4>

<ul>
@foreach($popularPosts as $post)
   
<li>
    <a href="{{ route('posts.show', $post->id) }}">
        {{ $post->title }}
    </a>

   ({{ $post->comments_count }} comments)</li>

@endforeach
</ul>
<a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary">
    View All Posts
</a>
</div>

@endsection