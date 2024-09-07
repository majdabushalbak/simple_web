@extends('layouts.app')

@section('title', 'الأصناف')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">Description: {{ $category->description ?? 'No description available.' }}</p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
