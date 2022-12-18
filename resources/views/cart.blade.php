@extends('layouts.app')

@section('content')
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
            <h3>Your cart :</h3>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Tattoo</th>
                        <th style="width:10%">Category</th>
                        <th style="width:15%" class="text-center">Price</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session()->get('cart') as $key => $tattoo)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="{{ $tattoo['img'] }}" alt="..."
                                            class="img-responsive" height="100px" width="70px" /></div>
                                    <div class="col-sm-10">
                                        <h4><a class="nomargin" href="">{{ $tattoo['name'] }}</a></h4>
                                        <p>Describes : {{ substr($tattoo['des'], 0, 90) }} ...</p>
                                    </div>
                                </div>
                            </td>
                            <td><a class="nomargin" href="">{{ $tattoo['category'] }}</a></td>
                            <td class="text-center top50">{{ number_format($tattoo['price']) }} VND</td>
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
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td class="text-center" style="font-weight: bold">Total :</td>
                        <td class="text-center">{{ number_format(session()->get('total')) }}VND</td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('home') }}"><button class="btn center-block cart">Continue to home
                                    !</button></a>
                        </td>
                        <td colspan="2" class="hidden-xs"></td>
                        @if (Auth::check())
                            <td class="hidden-xs text-center">
								<form action="{{ route('cart.submit') }}" method="post">
									@csrf
									<label for="booking_date">Booking Date</label>
									<input type="datetime" name="booking_date"/>
									<button type="submit">Submit Order</button>
								</form>
                            </td>
                        @else
                            <p>You must login to checkout this cart</p>
                        @endif
                    </tr>
                </tfoot>
            </table>
        @endif
    </div>
@endsection
