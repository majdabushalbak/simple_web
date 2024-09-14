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
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $category->id }}">
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            عند حذف الفئة، يتم حذف جميع المنتجات المتعلقة بها.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
