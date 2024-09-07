<script src="/js/slider-script.js" defer></script>

<div class="wrapper" role="group" aria-label="Categories">
    
    <div class="icon"> <i id="left" class="fa-solid fa-angle-left"></i></div>


 <ul class="tabs-box">
        <!-- All Products Button -->
        <li  onclick="location.href='{{ route('products.index') }}'"
            class=" tab {{ !$selectedCategory ? 'active' : '' }} ">الكل</li>
    
        <!-- Category Buttons -->
        @foreach ($categories as $category)
            <li  onclick="location.href='{{ route('products.index', ['category_id' => $category->id]) }}'"
                class=" tab {{ $selectedCategory == $category->id ? 'active' : '' }} ">{{ $category->name }}</li>
        @endforeach
    
 </ul>

    <div class="icon"> <i id="right" class="fa-solid fa-angle-right"></i></div>
   
</div>