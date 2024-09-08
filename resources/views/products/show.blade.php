<!-- resources/views/products/show.blade.php -->
<link href="{{   asset('css/show-product-page.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
<div class="  text-end">
    <div class="row flex-wrap-reverse justify-content-between align-items-center">
        <div class=" align-self-end col-12 col-lg-6">
            <h1>{{ $product->name }}</h1>

            <hr>
            <p class="description">{{ $product->description }}</p>
            <p><b>Price:</b> ${{ $product->price }}</p>
            <br><br>
            <a href="{{ route('products.index') }}" class="btn btn-dark">Back to Products</a>
        </div>

        <div class="col-12  col-lg-5 mb-5">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-img img-fluid ">
            @else
                <p>No image available</p>
            @endif


        </div>
    </div>
</div>
@endsection
