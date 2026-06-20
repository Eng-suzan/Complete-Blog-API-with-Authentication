@extends('layouts.app_layout')

@section('title','Categories')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Categories List</h2>

    <a href="{{ route('categories.create') }}"
       class="btn btn-primary">
        Add Category
    </a>

</div>

<div class="card">

    <div class="card-body">
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>
    </div>
@endif
        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $category)

                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>

                        <td>

                            <a href="{{ route('categories.edit',$category->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('categories.destroy',$category->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="text-center">
                            No Categories Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection