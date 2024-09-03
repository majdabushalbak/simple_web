<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alnour -  @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/images/Logo.svg">
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
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ URL('/images/Logo.svg') }}" alt="Logo"/>
                <p class="d-inline-block m-0 mx-3 "style="font-size:4.5rem">النّور</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                     @auth
                        @if (Auth::user()->role === 1)
                    <div class="dropdown">
                        <button class=" btn-gold dropdown-toggle px-2 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu px-4 py-3 mt-3 corner  ">
                          
                     
                            <li class="d-block w-100 " onclick="location.href='{{ route('home') }}'">
                                <p class="fs-5 text-nowrap  text-center  corner user" >{{ Auth::user()->name }}</p>
                            </li>
                            <li class="">
                                <hr/>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn  btn-danger corner text-nowrap ">تسجيل الخروج</button>
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
                      </div>
                      
                   
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
    <div class="page-container  mx-4 mx-lg-5 mt-5">
        @yield('content')
    </div>




    <footer class="px-5 mt-5  w-100    ">

    <div class="w-75 d-flex flex-column flex-lg-row justify-content-between align-items-start align-self-start gap-5  ">
        
                <div class="d-flex flex-column justify-content-end align-items-start ">
                    <a class="navbar-brand d-flex align-items-end" href="{{ route('home') }}">
                        <img src="{{ URL('/images/Logo.svg') }}" alt="Logo"/>
                        <p class="d-inline-block m-0 mx-3 "style="font-size:4.5rem">النّور</p>
                    </a>
                    
                    <span class="copy-right mt-2 text-end"> جميع الحقوق محفوظة لموقع Copyright Alnour © {{ date('Y') }}</span>
                </div>
        
                <div class="d-flex flex-column  social-media-links align-items-start ">
        
                   <div>
                    <h4 class="text-start mb-3">تابعونا على</h4>
                    <h5 class="mb-3  text-start">alnour.ps@</h5>
                        <a href="https://www.tiktok.com/@anour.ps?_t=8pJQrG0wzJJ&_r=1" target="_blank" class="">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=61559961010130&mibextid=LQQJ4d" target="_blank" class="me-3">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/alnour.ps/" target="_blank" class="me-3">
                            <i class="fab fa-instagram"></i>
                        </a>
                   </div>
                </div>
        
                <div class="d-flex flex-column footer-links align-items-start ">
                    <h4 class="mb-3">الأقسام</h4>
                    <a class="" href="{{ route('products.index') }}">المنتجات</a>
                    @if (auth()->check() && auth()->user()->role === 1)
                        <a class="mt-2" href="{{ route('categories.index') }}">الفئات</a>
                    @endif
                    <a class="mt-2" href="{{ route('aboutus') }}">من نحن</a>
                </div>
        
        
                
                <div class="d-flex flex-column align-items-start ">
                    <h4 class="mb-3">اتصل بنا</h4>
                    <span class="   "><b>هاتف: </b><span dir="ltr" >+970-599-927-273</span>  </span>
                  
                    <span class="  mt-2 text-end">  <b>العنوان:</b> رام الله ، بيتونيا </span>
                </div>
                
              
    </div>
           

    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>