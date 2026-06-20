@extends('layouts.app_layout')

@section('title','posts')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Posts List</h2>

    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        + Add Post
    </a>

</div>

{{-- Search --}}
<form method="GET" class="mb-3">
    <input type="text" name="search" class="form-control"
           placeholder="Search posts..."
           value="{{ request('search') }}">
</form>

<div class="card">
    <div class="card-body">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($posts as $post)

                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>{{ $post->user->name ?? '-' }}</td>
                        <td>{{ $post->category->name ?? '-' }}</td>

                        <td>

                            <a href="{{ route('posts.edit',$post->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('posts.destroy',$post->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this post?')">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No Posts Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $posts->links() }}
        </div>

    </div>
</div>

@endsection