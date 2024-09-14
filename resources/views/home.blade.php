@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
    <div >
       
                <img class="home-img" src="{{ URL('/images/pexels-cottonbro-9811639.jpg') }}" />
                
     <div class="layer"></div >
          
    

                    @if ($randomProducts->isEmpty())
                    <div class="d-flex justify-content-center  " > <h2 class="my-5 ">لا توجد منتجات لهذه الفئة.</h2></div>
                 @else
                     <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 ">
                        @foreach($randomProducts as $id)
                        
                        <x-products.card :product="$id"/>
                    @endforeach
                     </div>
                 @endif
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">استعرض المنتجات</a>
    </div>
@endsection
