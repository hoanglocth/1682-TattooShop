@extends('layouts.app')

@section('content')
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="{{ asset('images/hero-banner.png') }}" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Shop is fun</h4>
                        <h1>Browse Our Premium Product</h1>
                        <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without
                            morning over third. Their male dry. They are great appear whose land fly grass.</p>
                        <a class="button button-hero" href="#">Browse Now</a>
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
                        <p>Popular Item in the market</p>
                        <h2>Best <span class="section-intro__style">Sellers</span></h2>
                    </div>
                    <div class="row">
                        @foreach ($tattoos as $tattoo)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="{{ $tattoo->img }}" alt="">
                                        <ul class="card-product__imgOverlay">
                                            <li><button
                                                    onclick="window.location='{{ route('tattoo', $tattoo->id) }}'"><i
                                                        class="ti-search"></i></button></li>
                                            <li><button><i class="ti-shopping-cart"></i></button></li>
                                            <li><button><i class="ti-heart"></i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Accessories</p>
                                        <h4 class="card-product__title"><a
                                                href="single-product.html">{{ $tattoo->name }}</a>
                                        </h4>
                                        <p class="card-product__price">{{ $tattoo->price }}</p>
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
