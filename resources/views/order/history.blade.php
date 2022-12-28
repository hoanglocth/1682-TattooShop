@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('user.layouts.menu')
            </div>
            <div class="col-9 infocontainer">
                <h1>History Orders</h1>
                <table id="example" class="display text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Price</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Note</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ number_format($order->price) }} VND</td>
                                <td>{{ $order->date_borrow }}</td>
                                <td>{{ $order->date_give_back }}</td>
                                @switch($order->status)
                                    @case(3)
                                        <td>
                                            <h5><span class="badge badge-pill badge-danger">Finish</span></h5>
                                        </td>
                                    @break

                                    @case(4)
                                        <td>
                                            <h5><span class="badge badge-pill badge-info">Cancel</span></h5>
                                        </td>
                                    @break
                                @endswitch
                                <td><a href="{{ route('order.detail',$order->id) }}"><button type="button"
                                            class="btn btn-xs btn-warning">View Details</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
