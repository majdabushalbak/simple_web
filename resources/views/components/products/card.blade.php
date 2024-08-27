<link href="{{   asset('css/products-page.css') }}" rel="stylesheet">

<div class="card h-100" onclick="location.href='{{ route('products.show', $product) }}'">
    <!-- Image with fixed size -->
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
        class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text"><strong>السعر:</strong> ${{ $product->price }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">

                @if (Auth::check() && Auth::user()->role === 1)
                    <a href="{{ route('products.edit', $product) }}"
                        class="btn btn-sm btn-outline-dark">تعديل</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-dark"
                            onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟')">حذف</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>