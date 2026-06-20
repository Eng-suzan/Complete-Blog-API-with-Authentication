@extends('layouts.app_layout')

@section('title','Edit Category')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header bg-warning">
                <h4>Edit Category</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Category Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ $category->name }}"
                        >
                    </div>

                    <button class="btn btn-success">
                        Update Category
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection