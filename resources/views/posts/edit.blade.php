@extends('layouts.app_layout')

@section('title','Edit Post')

@section('content')

<div class="card">
    <div class="card-body">

        <h3>Edit Post</h3>

        <form action="{{ route('posts.update',$post->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control"
                       value="{{ $post->title }}">
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label>Content</label>
                <textarea name="content" class="form-control">{{ $post->content }}</textarea>
            </div>

            {{-- User --}}
            <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control">

                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            {{ $post->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id[]" multiple class="form-control">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $post->categories->contains($category) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection