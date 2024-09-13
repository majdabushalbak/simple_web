@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
    <div >
       
                <img class="home-img" src="{{ URL('/images/pexels-cottonbro-9811639.jpg') }}" />
                
     <div class="layer"></div >
          
    

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
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">استعرض المنتجات</a>
    </div>
@endsection
