@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<link href="{{   asset('css/products-page.css') }}" rel="stylesheet">
    <div >
       
               
               
                <div class="my-cover mb-3 mb-md-5">
                    
                    
                    <div class="title h1 pb-5 m-0">متعة خالصة في كل قضمة. مع النّور <span>  
                      <img class="ps" src="{{ URL('/images/ps.png') }}" alt="PS"/></span> </div>
                  </div> 
          
    

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
                   
            
                  </div>
                  <div class="d-flex justify-content-center align-items-center mt-3 mt-md-4 mt-lg-5" style="background-color:whitesmoke; margin-bottom: -3rem; height:25dvh;
"> <button onclick="location.href='{{ route('products.index') }}'" class="button-28 mx-auto my-5" role="button">استعرض المنتجات</button></div>
    </div>
@endsection
