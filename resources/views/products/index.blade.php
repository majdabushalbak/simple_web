@extends('layouts.app')

@section('content')
    <!-- Full-Page Background Image -->
    <div class="background-image-container">
        <!-- Optional content for background overlay can go here -->
    </div>

    <!-- Product Content Section -->
    <div class="product-content">
        <!-- Add Product Button -->
        <div class="mb-4 d-flex justify-content-start">
            @if (Auth::check() && Auth::user()->role === 1)
                <a href="{{ route('products.create') }}" class="btn btn-success">إضافة منتج جديد</a>
            @endif
        </div>

        <!-- Category Filter Buttons -->
        <div class="mb-4">
            <h4>الفئات:</h4>
            <div class="btn-group" role="group" aria-label="Categories">
                <!-- All Products Button -->
                <a href="{{ route('products.index') }}"
                    class="btn btn-dark {{ !$selectedCategory ? 'active' : '' }} mx-1">الكل</a>

                <!-- Category Buttons -->
                @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category_id' => $category->id]) }}"
                        class="btn btn-dark {{ $selectedCategory == $category->id ? 'active' : '' }} mx-1">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>

        <!-- Product Cards -->
        @if ($products->isEmpty())
            <p>لا توجد منتجات لهذه الفئة.</p>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100" onclick="location.href='{{ route('products.show', $product) }}'">
                            <!-- Image with fixed size -->
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text"><strong>السعر:</strong> ${{ $product->price }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        @if (Auth::check() && Auth::user()->role === 1)
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="btn btn-sm btn-outline-dark">تعديل</a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-dark"
                                                    onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟')">حذف</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
