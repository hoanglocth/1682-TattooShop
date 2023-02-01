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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    @yield('custom-css')
</head>
<!DOCTYPE html>
<html lang="en">

<body class="d-flex flex-column min-vh-100">
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="/images/logo.png"
                            alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            @if (!Auth::check() or Auth::user()->roles == 0)
                                <li class="nav-item {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"><a
                                        class="nav-link" href="{{ route('home') }}">Home</a></li>
                            @endif
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
                                            class="nav-item {{ Route::currentRouteName() === 'admin.user.index' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('admin.user.index') }}">Users</a>
                                        </li>
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
                                            <a class="nav-link" href="{{ route('admin.order.index') }}">Orders</a>
                                        </li>
                                    @endif
                                @else

                                @endif
                            @endif
                        </ul>
                        @if (!Auth::check() or Auth::user()->roles == 0)
                            <ul class="nav-shop">
                                <li class="nav-item">
                                    <a href="{{ route('cart.index') }}">
                                        @if (!session()->get('cart'))
                                            <button><i class="ti-shopping-cart"></i><span
                                                    class="nav-shop__circle">0</span></button>
                                        @else
                                            <button><i class="ti-shopping-cart"></i><span
                                                    class="nav-shop__circle">{{ count(session()->get('cart')) }}</span></button>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if (Auth::check())
                            <ul>
                                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                    <ul class="nav navbar-nav menu_nav ml-4 mr-auto">
                                        <li class="nav-item submenu dropdown">
                                            <a class="nav-link dropdown-toggle" href="#"
                                                id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                                                    class="rounded-circle" height="25"
                                                    alt="Black and White Portrait of a Man" loading="lazy" />
                                            </a>
                                            <ul class="dropdown-menu">
                                                @if (Auth::user()->roles == 0)
                                                    <li class="nav-item"><a class="nav-link"
                                                            href={{ route('account.index') }}>Profile</a>
                                                    </li>
                                                @endif
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('logout') }}">Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <main class="site-main">
        <div class="container" style="margin-top: 19px">
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
    <footer class="mt-auto">
        <div class="footer-area">
            <div class="container">
                <div class="row section_gap">

                    <div class="offset-lg-0 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>
                                    381 Nui Thanh, Hai Chau District, Da Nang City
                                </p>
                                <br>
                                <p class="sm-head">
                                    <span class="fa fa-phone"></span>
                                    012345678
                                </p>
                                <br>
                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span>
                                    tattoodanang@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Business Hours</h4>
                            <ul class="list">
                                <li>Monday - Saturday: 08 AM - 18 PM</li>
                                <li>Sunday: 10 AM - 16 PM</li>
                                <li>Holiday: Cease</li>
                            </ul>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Our Mission</h4>
                            <p>
                                "Built by True Artists, For True Artists"
                            </p>
                            <p>
                                Helping tattoo artists and the tattoo community is at the heart of everything we do.
                            </p>
                            <p>
                                Of course, we cannot do this alone. Your support and wide promotion of our products have
                                helped us to get where we are. Together, we can make a difference and give back to the
                                tattoo community!
                            </p>
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
    <script ssrc="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/vendors/skrollr.min.js"></script>
    <script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="/vendors/jquery.ajaxchimp.min.js"></script>
    <script src="/vendors/mail-script.js"></script>
    <script src="/js/main.js"></script>
    {{-- <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
    @yield('custom-js')
    <script type="text/javascript" src="{{ asset('/js/cart.js') }}"></script>
</body>

</html>
