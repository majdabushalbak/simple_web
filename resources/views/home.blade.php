@extends('layouts.app')

@section('title', 'الصفحة الرئيسية - مشروع Laravel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">مرحبا بك في متجرنا!</h1>
            <p class="lead mb-4">نحن هنا لتقديم أفضل المنتجات والخدمات لك. تصفح موقعنا واستمتع بأحدث العروض والمنتجات.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">استعرض المنتجات</a>
        </div>
    </div>
</div>
@endsection
