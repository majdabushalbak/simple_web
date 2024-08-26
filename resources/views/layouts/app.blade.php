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
    <style>
        body {
            font-family: "Readex Pro", Arial, Helvetica, sans-serif;
        }

        .container {
            flex: 1;
            padding-top: 70px;
            padding-bottom: 120px;
            text-align: right;
            /* Align text in the container to the right */
        }

        footer {
            background-color: rgb(0, 0, 0);
            color: #eaeaea;
            padding: 20px 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            /* Stack items vertically */
            justify-content: center;
            /* Center items vertically */
            align-items: center;
            /* Center items horizontally */
        }

        .footer-links {
            margin-bottom: 10px;
            /* Space between links and text */
        }

        .footer-links a {
            color: #eaeaea;
            margin: 0 10px;
            /* Space between links */
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #f9f9f9;
        }

        .footer-text {
            font-size: 0.9rem;
            /* Slightly smaller text for the footer */
        }



        /* Container Padding */
        .container {
            flex: 1;
            padding-top: 70px;
            padding-bottom: 120px;
            text-align: right;
            /* Align text in the container to the right */
        }



        footer .social-media-links {
            margin: 10px 0;
            /* Space above and below the social media links */
        }

        footer .social-media-links a {
            color: #eaeaea;
            font-size: 1.5rem;
            /* Adjust the size of the icons */
            text-decoration: none;
        }

        footer .social-media-links a:hover {
            color: #f9f9f9;
        }

        .card {
            width: 18rem;
            /* Set a fixed width for the card */
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background: #f2bb3d;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center align the card content */
        }

        .card:hover {
            cursor: pointer;
        }

        /* Circular Image with Fixed Size */
        .card-img-top {
            width: 150px;
            /* Set a fixed width for the image */
            height: 150px;
            /* Set a fixed height for the image */
            border-radius: 50%;
            /* Make the image circular */
            object-fit: cover;
            /* Ensure the image covers the area without stretching */
            margin-top: 15px;
            /* Add some margin to separate from the card edges */
        }

        /* Logo Image */
        .navbar-brand img {
            max-height: 15dvh;
            /* Adjust the logo size */
        }

        nav {
            background-color: #000000;
        }

        .nav-link {
            font-size: 1.3rem;
            font-weight: bold;
            color: #ffffff;
            border-width: 0 0 0.5rem 0;
            border-style: solid;
            border-color: #000;
        }

        .nav-link:hover {
            color: #ffffff;
            border-width: 0 0 0.5rem 0;
            border-style: solid;
            border-color: #ffffff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg border-bottom" data-bs-theme="dark">
        <div class="container-fluid">
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
                <ul class="navbar-nav ms-auto">
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

    <div class="container mt-5">
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
