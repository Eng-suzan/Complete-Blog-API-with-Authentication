@extends('layouts.app_layout')

@section('title', 'Category Posts')

@section('content')

<h2>Category: {{ $category->name }}</h2>

<hr>

@if($category->posts->count() > 0)

    @foreach($category->posts as $post)

        <div class="card mb-3">
            <div class="card-body">

                <h5>{{ $post->title }}</h5>

                <p>{{ Str::limit($post->content, 100) }}</p>

                <small>
                    By: {{ $post->user->name ?? '-' }}
                </small>

                <br>

                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm mt-2">
                    View Post
                </a>

            </div>
        </div>

    @endforeach

@else
    <p>No posts in this category.</p>
@endif

@endsection