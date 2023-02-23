@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Popular Item in the market</p>
            <h2>Latest <span class="section-intro__style">News</span></h2>
        </div>

        <div class="row justify-content-center">
            @foreach ($artists as $key => $artist)
                <div class="col-md-6 col-lg-6 mb-4 mb-lg-0">
                    <div class="card card-blog">
                        <div class="card-blog__img">
                            <img class="card-artist rounded-0" src="{{ $artist->img }}" alt="">
                        </div>
                        <div class="card-body">
                            <h4 class="card-blog__title"><a href="{{ route('artist.detail', $artist->id) }}">{{ $artist->name }}</a></h4>
                            <p>{{ substr($artist->describes, 0, 99) }}.. </p>
                            <a class="card-blog__link" href="{{ route('artist.detail', $artist->id) }}">Read More <i
                                    class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
