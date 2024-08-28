<!-- resources/views/products/show.blade.php -->
<link href="{{   asset('css/show-product-page.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
<div class="container text-end">
    <div class="row">
        <div class="col-6">
            <h1>{{ $product->name }}</h1>
            <br>
            <hr>
            <p class="description">{{ $product->description }}</p>
            <p><b>Price:</b> ${{ $product->price }}</p>
            <br><br>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
        </div> 

        <div class="col-4 ">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-img img-fluid">
            @else
                <p>No image available</p>
            @endif
            
           
        </div>
    </div>
</div>
@endsection
