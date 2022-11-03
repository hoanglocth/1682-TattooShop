<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <script src="/js/main.js"></script>


    <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/css/style.css">
    @yield('custom-css')
</head>
<!DOCTYPE html>
<html lang="en">

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="{{ route('home') }}">LOGO</a>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                            @if (!Auth::check())
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @else
                                @if (Auth::user()->roles == 1)
                                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Admin
                                            Dashboard</a></li>
                                    @if (str_contains(Request::fullUrl(), 'admin'))
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('admin.category.index') }}">Categories</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('admin.tattoo.index') }}">Tattoos</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('admin.index') }}">Orders</a></li>
                                    @endif
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <main class="site-main">
        <div class="container">
            @if (session('class'))
                <div class="alert alert-{{ session('class') }} alert-dismissible fade show">
                    <li>{{ session('message') }}</li>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        @yield('content')
    </main>

    <script src="/vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/vendors/skrollr.min.js"></script>
    <script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="/vendors/jquery.ajaxchimp.min.js"></script>
    <script src="/vendors/mail-script.js"></script>
    <script src="js/main.js"></script>
    @yield('custom-js')
</body>

</html>
