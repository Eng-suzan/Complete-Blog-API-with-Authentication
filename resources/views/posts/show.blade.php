@extends('layouts.app_layout')

@section('title', $post->title)

@section('content')

<div class="card">
    <div class="card-body">

        <h2>{{ $post->title }}</h2>

        <p>
            <strong>Author:</strong>
            {{ $post->user->name ?? '-' }}
        </p>

        <p>
            <strong>Categories:</strong>
            {{ $post->categories->pluck('name')->join(', ') ?: '-' }}
        </p>

        <hr>

        <p>{{ $post->content }}</p>



        <hr>
        
<h3>Comments</h3>

@forelse($comments as $comment)

    <div class="card mb-2">
        <div class="card-body">

            <h6>{{ $comment->author_name }}</h6>

            <p class="mb-0">
                {{ $comment->content }}
            </p>

        </div>
    </div>

@empty

    <p>No comments yet.</p>

@endforelse
<div class="mt-3">
    {{ $comments->links() }}
</div>

<h3>Add Comment</h3>

<form action="{{ route('comments.store') }}" method="POST">
    @csrf

    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input
            type="text"
            name="author_name"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Comment</label>
        <textarea
            name="content"
            class="form-control"
            rows="4"
            required></textarea>
    </div>

    <button class="btn btn-primary">
        Add Comment
    </button>
</form>

<hr>


        <a href="{{ route('posts.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>
</div>

@endsection