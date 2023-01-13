@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-6">
                        <div class="owl-carousel owl-theme s_Product_carousel owl-loaded owl-drag">

                            
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-1080px, 0px, 0px); transition: all 0s ease 0s; width: 2700px;">
                                    <div class="owl-item cloned" style="width: 540px;">
                                        <div class="single-prd-item">
                                            <img class="img-fluid" src="{{$tattoo->img}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 540px;">
                                        <div class="single-prd-item">
                                            <img class="img-fluid" src="{{$tattoo->img}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 540px;">
                                        <div class="single-prd-item">
                                            <img class="img-fluid" src="{{$tattoo->img}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 540px;">
                                        <div class="single-prd-item">
                                            <img class="img-fluid" src="{{$tattoo->img}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 540px;">
                                        <div class="single-prd-item">
                                            <img class="img-fluid" src="{{$tattoo->img}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                        aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                    class="owl-next"><span aria-label="Next">›</span></button></div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <h3>{{ $tattoo->name }}</h3>
                            <h2>{{ $tattoo->price }}</h2>
                            <ul class="list">
                                <li><a class="active" href="#"><span>Category</span> :
                                        {{ $tattoo->category->name }}</a></li>
                                <li><a href="#"><span>Author</span> : {{ $tattoo->artists->name }}</a></li>
                            </ul>
                            <p>{{ $tattoo->description }}</p>
                            <button class="get-tattoo-btt" data-tattoo-id="{{ $tattoo->id }}">
                                Add to card
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
