@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<link href="{{   asset('css/products-page.css') }}" rel="stylesheet">
    <div >
       
                <img class="home-img" src="{{ URL('/images/pexels-cottonbro-9811639.jpg') }}" />
                
     <div class="layer"></div >
          
    

                  <div class="page-container mx-4 mx-lg-5 ">
                        @if ($randomProducts->isEmpty())
                        <div class="d-flex justify-content-center  " > <h2 class="my-5 ">لا توجد منتجات لهذه الفئة.</h2></div>
                     @else
                         <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4 ">
                            @foreach($randomProducts as $id)
                            
                            <div class="col">
                                <x-products.card :product="$id"/>
                                  </div>
                            @endforeach
                         </div>
                     @endif
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">استعرض المنتجات</a>
                  </div>
    </div>
@endsection
