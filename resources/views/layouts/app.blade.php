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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
                            <li class="nav-item {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"><a
                                    class="nav-link" href="{{ route('home') }}">Home</a></li>
                            @if (!Auth::check())
                                <li class="nav-item {{ Route::currentRouteName() === 'login' ? 'active' : '' }}"><a
                                        class="nav-link" href="{{ route('login') }}">Login</a></li>
                                <li class="nav-item {{ Route::currentRouteName() === 'register' ? 'active' : '' }}"><a
                                        class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @else
                                @if (Auth::user()->roles == 1)
                                    <li
                                        class="nav-item {{ Route::currentRouteName() === 'admin.index' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('admin.index') }}">Admin
                                            Dashboard</a>
                                    </li>
                                    @if (str_contains(Request::fullUrl(), 'admin'))
                                        <li
                                            class="nav-item {{ Route::currentRouteName() === 'admin.category.index' ? 'active' : '' }}">
                                            <a class="nav-link"
                                                href="{{ route('admin.category.index') }}">Categories</a>
                                        </li>
                                        <li
                                            class="nav-item {{ Route::currentRouteName() === 'admin.tattoo.index' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('admin.tattoo.index') }}">Tattoos</a>
                                        </li>
                                        <li
                                            class="nav-item {{ Route::currentRouteName() === 'admin.artist.index' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('admin.artist.index') }}">Artists</a>
                                        </li>
                                        <li
                                            class="nav-item {{ Route::currentRouteName() === 'admin.order.index' ? 'active' : '' }}">
                                            <a class="nav-link" href="#">Orders</a>
                                        </li>
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
                <div id="alert" class="alert alert-{{ session('class') }} alert-dismissible fade show">
                    <a>{{ session('message') }}</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        @yield('content')
    </main>
    <!--================ Start footer Area  =================-->
    <footer class="footer">
        <div class="footer-area">
            <div class="container">
                <div class="row section_gap">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title large_title">Our Mission</h4>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no
                                divided deep moved us lan Gathering thing us land years living.
                            </p>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no divided
                                deep moved
                            </p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Business Hours</h4>
                            <ul class="list">


                                <li>Monday - Saturday: 08 AM - 18 PM</li>
                                <li>Sunday: 10 AM - 16 PM</li>
                                <li>Holiday: Cease</li>
                            </ul>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>
                                    Head Office
                                </p>
                                <p>123, Main Street, Your City</p>

                                <p class="sm-head">
                                    <span class="fa fa-phone"></span>
                                    Phone Number
                                </p>
                                <p>
                                    +123 456 7890 <br>
                                    +123 456 7890
                                </p>

                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span>
                                    Email
                                </p>
                                <p>
                                    free@infoexample.com <br>
                                    www.infoexample.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex">
                    <p class="col-lg-12 footer-text text-center">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved |
                        <i class="fa fa-heart" aria-hidden="true"></i> Designed by Hoang Loc
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->
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
