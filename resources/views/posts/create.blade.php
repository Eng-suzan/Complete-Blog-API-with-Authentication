@extends('layouts.app_layout')

@section('title','Create Post')

@section('content')

<div class="card">
    <div class="card-body">

        <h3>Create New Post</h3>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
<div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control">
                    <option value="">-- Select User --</option>

                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option value="">-- Select Category --</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button class="btn btn-success">Save Post</button>

            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>
</div>

@endsection