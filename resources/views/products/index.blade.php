@extends('layouts.app')
@section('title', 'المنتجات')
@section('content')
<link href="{{   asset('css/products-page.css') }}" rel="stylesheet">
    <!-- Full-Page Background Image -->
    <div class="background-image-container">
        <!-- Optional content for background overlay can go here -->
    </div>

    <!-- Product Content Section -->
    <div class="product-content ">
        <!-- Add Product Button -->
        <div class="mb-4 d-flex justify-content-start">
            @if (Auth::check() && Auth::user()->role === 1)
                <a href="{{ route('products.create') }}" style=" margin: 0px 10px;" class="btn btn-gold">إضافة منتج جديد</a>
            @endif
        </div>

        <!-- Category Filter Buttons -->
        <div class="  mb-5" >
            @if($categories->isEmpty())
            <div class="d-flex justify-content-center" > <h2 class="my-5 ">لا توجد فئات.</h2></div>
                @else
                <x-products.categories-slider :categories="$categories" :selectedCategory="$selectedCategory"/>
                @endif
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
