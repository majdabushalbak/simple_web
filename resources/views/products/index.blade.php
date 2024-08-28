@extends('layouts.app')

@section('content')
    <!-- Full-Page Background Image -->
    <div class="background-image-container">
        <!-- Optional content for background overlay can go here -->
    </div>

    <!-- Product Content Section -->
    <div class="product-content ">
        <!-- Add Product Button -->
        <div class="mb-4 d-flex justify-content-start">
            @if (Auth::check() && Auth::user()->role === 1)
                <a href="{{ route('products.create') }}" class="btn btn-success">إضافة منتج جديد</a>
            @endif
        </div>

        <!-- Category Filter Buttons -->
        <div class="mb-4">
            <h4>الفئات:</h4>
            <div class="" role="group" aria-label="Categories">
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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 ">
                @foreach ($products as $product)
                    <div class="col">
                  <x-products.card :product="$product"/>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
