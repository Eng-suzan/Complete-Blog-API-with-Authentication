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

        <a href="{{ route('posts.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>
</div>

@endsection