@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row s_product_inner align-items-center">
            <div class="col-lg-6">
                <img class="center-cropped" style="max-width: 100%; height:40em" src="{{ $artist->img }}" alt="">
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_artist_text">
                    <h2><span class="section-intro_artist">{{ $artist->name }}</span>T</h2>
                    <p><b>Describe:</b> {{ $artist->describes }}
                    </p>
                </div>
            </div>
        </div>
    @endsection
