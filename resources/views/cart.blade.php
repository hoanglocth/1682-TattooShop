@extends('layouts.app')

@section('content')
    <section class="cart_area">
        <div class="container">
            @if (session()->get('cart') == null)
                <div class="row d-flex justify-content-center text-center">
                    <figure>
                        <img src="//pwa.scdn.vn/static/media/cart-empty.e2664e0f.svg" alt="Cart Image"><br>
                        <p>Empty Cart</p>
                        <a href="{{ route('home') }}"><button class="btn center-block cart">Continue to home !</button></a>
                    </figure>
                </div>
            @else
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table id="cart" class="table">
                            <thead>
                                <tr>
                                    <th style="width:50%">Tattoo</th>
                                    <th style="width:10%">Category</th>
                                    <th style="width:15%" class="text-center">Price</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session()->get('cart') as $key => $tattoo)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ $tattoo['img'] }}" alt="..." class="center-cropped"
                                                        style="width: 6em; height:6em" />
                                                </div>
                                                <div class="media-body">
                                                    <h4><a class="nomargin" href="">{{ $tattoo['name'] }}</a></h4>
                                                    <p>Describes : {{ substr($tattoo['des'], 0, 90) }} ...</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a class="nomargin" href="">{{ $tattoo['category'] }}</a></td>
                                        <td class="text-center">
                                            <h5>${{ number_format($tattoo['price']) }}</h5>
                                        </td>

                                        <td class="text-center">
                                            <form action="{{ route('cart.remove') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $tattoo['id'] }}">
                                                <input type="hidden" name="_method" value="delete" />
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="1"></td>
                                    <td class="text-center">
                                        <h5>Total</h5>
                                    </td>
                                    <td class="text-center">
                                        <h5>${{ number_format(session()->get('total')) }}</h5>
                                    </td>
                                </tr>

                                <tr class="out_button_area">

                                    <td><a
                                            href="{{ route('home') }}"><button class="gray_btn">Continue to
                                                home!</button></a>
                                    </td>
                                    <td colspan="2" class="hidden-xs"></td>
                                    @if (Auth::check())
                                        <td>
                                            <div class="checkout_btn_inner d-flex align-items-center">
                                                <form action="{{ route('cart.submit') }}" method="post">
                                                    @csrf
                                                    <label for="booking_date">Booking Date</label>
                                                    <input type="datetime-local" name="booking_date" />
                                                    <button type="submit" class="primary-btn ml-2">Proceed to
                                                        order</button>
                                                </form>
                                            </div>
                                        </td>
                                    @else
                                        <p>You must <a href="{{ route('login') }}"">
                                                login
                                            </a> to checkout this cart</p>
                                    @endif


                                </tr>

                            </tbody>


                        </table>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
