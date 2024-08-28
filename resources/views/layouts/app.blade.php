<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'الصفحة الرئيسية - مشروع Laravel')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    <link href="{{   asset('css/main.css') }}" rel="stylesheet">

    
   
</head>

<body>
    <nav class="navbar navbar-expand-lg pb-0" data-bs-theme="dark">
        <div class="container-fluid align-items-end">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ URL('storage/Logo.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        @if (Auth::user()->role === 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item">
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">تسجيل الخروج</button>
                        </form>
                        </li>
                    @else
                        {{-- Uncomment if needed for guest links --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                        </li> --}}
                    @endauth
                </ul>
                <ul class="navbar-nav ms-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">المنتجات</a>
                    </li>
                    @if (auth()->check() && auth()->user()->role === 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">الفئات</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutus') }}">من نحن</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- page content--}}
    <div class="page-container mx-4 mx-lg-5 mt-5">
        @yield('content')
    </div>




    <footer class="text-center">
        <div class="footer-links">
            <a href="{{ route('products.index') }}">المنتجات</a>
            @if (auth()->check() && auth()->user()->role === 1)
                <a href="{{ route('categories.index') }}">الفئات</a>
            @endif
            <a href="{{ route('aboutus') }}">من نحن</a>
        </div>
        <div class="social-media-links">
            <a href="https://www.tiktok.com/yourprofile" target="_blank" class="me-3">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://www.facebook.com/yourprofile" target="_blank" class="me-3">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/yourprofile" target="_blank" class="me-3">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        {{-- <div class="container">
            <span>© {{ date('Y') }} مشروع Laravel. جميع الحقوق محفوظة.</span>
        </div> --}}
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
