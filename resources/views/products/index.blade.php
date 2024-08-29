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
        <div class="mb-5">
            
            <div class="d-flex flex-wrap" role="group" aria-label="Categories">
                <!-- All Products Button -->
                <a style="border-radius: 0" href="{{ route('products.index') }}"
                    class="btn btn-dark {{ !$selectedCategory ? 'active' : '' }} m-1">الكل</a>

                <!-- Category Buttons -->
                @foreach ($categories as $category)
                    <a style="border-radius: 0" href="{{ route('products.index', ['category_id' => $category->id]) }}"
                        class="btn btn-dark {{ $selectedCategory == $category->id ? 'active' : '' }} m-1">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>

        <!-- Product Cards -->
        @if ($products->isEmpty())
           <div class="d-flex justify-content-center  " > <h2 class="my-5 ">لا توجد منتجات لهذه الفئة.</h2></div>
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
