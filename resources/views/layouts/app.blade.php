<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    @include('layouts.styles')
    @yield('custom-css')
</head>
<!DOCTYPE html>
<html lang="en">

<body class="d-flex flex-column min-vh-100">
    @include('layouts.header')

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
        <section class="section-margin--small mb-5">
            @yield('content')
        </section>
    </main>

    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('custom-js')

</body>

</html>
