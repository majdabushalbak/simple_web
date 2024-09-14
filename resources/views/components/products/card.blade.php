<div class="card text-center h-100 flex-grow-1 border-light" >
    <!-- Image with fixed size -->
    <img onclick="location.href='{{ route('products.show', $product) }}'" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
        class="card-img-top border-light">
    <div class="card-body d-flex flex-column justify-content-end align-items-center">
        <h5 onclick="location.href='{{ route('products.show', $product) }}'" class="card-title mb-4">{{ $product->name }}</h5>
        <p onclick="location.href='{{ route('products.show', $product) }}'" class="card-text">{{ $product->price }} <i class="fa-solid fa-shekel-sign"></i></p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="mx-auto">
                @if (Auth::check() && Auth::user()->role === 1)
                    <a href="{{ route('products.edit', $product) }}"
                        class="btn btn-sm btn-outline-dark corner">تعديل</a>
                    <button class="btn btn-sm btn-outline-danger corner" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $product->id }}">
                        حذف
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal-{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                هل أنت متأكد أنك تريد حذف هذا المنتج؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>
