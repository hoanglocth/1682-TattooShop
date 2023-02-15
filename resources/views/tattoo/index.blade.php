@extends('layouts.app')
@section('custom-css')
    <style>
        ul.a {
            list-style: none;
            height: 400px;
            overflow-x: hidden;
            overflow-y: scroll;

            li {
                height: 30px;
                background: #ccc;
                border-bottom: black 1px solid;
            }

        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-12" style="max-height: 200px">
                <div class="category-list">
                    <p class="list-group-item cat-item text-left" style="background-color: #343a40;color: white">Categories
                    </p>
                    <ul class="list-group a">

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
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center"
                    data-category-id="{{ $tattoos[0]->category->id }}" id="options">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                </div>
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @foreach ($tattoos as $key => $tattoo)
                            <div class="col-md-6 col-lg-4">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <a href="{{ route('tattoo', $tattoo->id) }}"><img class="card-img"
                                                src="{{ $tattoo->img }}" alt=""></a>

                                        <ul class="card-product__imgOverlay">
                                            <li><button class="get-tattoo-btt" data-tattoo-id="{{ $tattoo->id }}"><i
                                                        class="ti-shopping-cart"></i></button></li>
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
                </section>
                <!-- End Best Seller -->
                <div style="width: 100%;" class="d-flex justify-content-center">
                    {!! $tattoos->appends(request()->query())->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    @endsection
