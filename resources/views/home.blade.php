@extends('layouts.app')

@section('content')
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="{{ asset('images/banner.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Tattoo is an art</h4>
                        <h1>MY TATTOOS ARE MY STORY</h1>
                        <p>It is not a temporary game, but the tattoo engraved on the body will follow us throughout the
                            life, so, decided to tattoo, it is necessary to find a good tattoo artist - prestige.</p>
                        <a class="button button-hero" href="#">Introduction</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="section-intro pb-60px">
                        <p>Popular tattoos in collection</p>
                        <h2>Trending <span class="section-intro__style">Tattoos</span></h2>
                    </div>
                    <div class="row">
                        @foreach ($tattoos as $tattoo)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <a href="{{ route('tattoo', $tattoo->id) }}"><img class="card-img"
                                                src="{{ $tattoo->img }}" alt=""></a>
                                        <ul class="card-product__imgOverlay">
                                            <li><button onclick="window.location='{{ route('tattoo', $tattoo->id) }}'"><i
                                                        class="ti-search"></i></button></li>
                                            <li><button><i class="ti-shopping-cart"></i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Design by {{ $tattoo->artists->name }}</p>
                                        <h4 class="card-product__title"><a
                                                href="single-product.html">{{ $tattoo->name }}</a>
                                        </h4>
                                        <p class="card-product__price">${{ $tattoo->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
