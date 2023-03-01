<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                @if (!Auth::check() or Auth::user()->roles == 0)
                    <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="/images/logo.png"
                            alt=""></a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        @if (!Auth::check() or Auth::user()->roles == 0)
                            <li class="nav-item {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"><a
                                    class="nav-link" href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item {{ Route::currentRouteName() === 'introduction' ? 'active' : '' }}"><a
                                    class="nav-link" href="{{ route('introduction') }}">Introduction</a></li>
                            <li
                                class="nav-item
                                    {{ Route::currentRouteName() === 'tattoo.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('tattoo.index') }}">Tattoo</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() === 'artist.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('artist.index') }}">Artist</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() === 'contact.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
                            </li>
                        @elseif (Auth::user()->roles == 1)
                            <li class="nav-item {{ Route::currentRouteName() === 'admin.index' ? 'active' : '' }}">
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
                                    <a class="nav-link" href="{{ route('admin.category.index') }}">Categories</a>
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
                                    class="nav-item {{ Route::currentRouteName() === 'admin.contactus.index' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.contactus.index') }}">Feedbacks</a>
                                </li>
                                <li
                                    class="nav-item {{ Route::currentRouteName() === 'admin.order.index' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.order.index') }}">Orders</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                    @if (!Auth::check() or Auth::user()->roles == 0)
                        <ul class="nav-shop">
                            <li class="nav-item">
                                <form class="input-group filter-bar-search" action="{{ route('search.index') }}"
                                    method="get">
                                    <input type="text" name="keysearch" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('cart.index') }}">
                                    @if (!session()->get('cart'))
                                        <button class="button-cart"><i class="ti-shopping-cart"></i><span
                                                class="nav-shop__circle">0</span></button>
                                    @else
                                        <button class="button-cart"><i class="ti-shopping-cart"></i><span
                                                class="nav-shop__circle">{{ count(session()->get('cart')) }}</span></button>
                                    @endif
                                </a>
                            </li>

                        </ul>
                        <ul class="nav-shop">
                            @if (!Auth::check())
                                <li class="nav-item"><a class="button button-header"
                                        href="{{ route('login') }}">Login</a></li>
                                <li class="nav-item"><a class="button button-header"
                                        href="{{ route('register') }}">Register</a></li>
                            @endif
                        </ul>
                    @endif
                    @if (Auth::check())
                        <ul>
                            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                <ul class="nav navbar-nav menu_nav ml-4 mr-auto">
                                    <li class="nav-item submenu dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
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
