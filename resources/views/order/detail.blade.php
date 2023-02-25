@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('user.layouts.menu')
            </div>
            <div class="col-9 infocontainer">
                <div class="order_details_table">
                    <h2>Order ID: {{ $order->id }}</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tattoo</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Artist</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_order as $do)
                                    <tr>
                                        <td>{{ $do->tattoo->name }}</td>
                                        <td>${{ number_format($do->tattoo->price) }}</td>
                                        <td>{{ $do->tattoo->category->name }}</td>
                                        <td>{{ $do->tattoo->artists->name }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                      <h4>Total</h4>
                                    </td>
                                    <td>
                                        <h4>${{ $do->order->price }}</h4>
                                    </td>
                                    <td colspan="3">
                                    </td>
                                  </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
