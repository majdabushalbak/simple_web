@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">مرحبا بك في متجرنا!</h1>
                <p class="lead mb-4">نحن هنا لتقديم أفضل المنتجات والخدمات لك. تصفح موقعنا واستمتع بأحدث العروض والمنتجات.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">استعرض المنتجات</a>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="mb-4">منتجات عشوائية</h2>
                <ul class="list-group">
                    @foreach($randomProductIds as $id)
                        <li class="list-group-item">منتج ID: {{ $id }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
