@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-sm-12 col-12">
                <div class="category-list">
                    <p class="list-group-item cat-item text-left" style="background-color: #343a40;color: white">Categories
                    </p>
                    <ul class="list-group">

                        @foreach ($categories as $category)
                            <a href="{{ route('category', $category->id) }}">
                                <li class="list-group-item cat-item">
                                    {{ $category->name }}
                                </li>
                            </a>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 col-12">
                <div class="section-intro pb-60px">
                    <p>Popular tattoo in the market</p>
                    <h2>Trending <span class="section-intro__style">Product</span></h2>
                </div>
                <div class="row">
                    @foreach ($tattoos as $key => $tattoo)
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <a href="{{ route('tattoo', $tattoo->id) }}"><img class="card-img" src="{{ $tattoo->img }}" alt=""></a>
                                    
                                    <ul class="card-product__imgOverlay">
                                        <li><button class="get-tattoo-btt" data-tattoo-id="{{ $tattoo->id }}"><i class="ti-shopping-cart"></i></button></li>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>Design by {{ $tattoo->artists->name }}</p>
                                    <h4 class="card-product__title"><a
                                            href="{{ route('tattoo', $tattoo->id) }}">{{ $tattoo->name }}</a></h4>
                                    <p class="card-product__price">${{ $tattoo->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
