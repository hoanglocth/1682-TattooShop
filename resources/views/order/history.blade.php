@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('user.layouts.menu')
            </div>
            <div class="col-9 infocontainer">
                <h2>History Orders</h2>
                <table id="example" class="display text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Price</th>
                            <th>Booking Date</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>${{ number_format($order->price) }}</td>
                                <td>{{ $order->date_booking }}</td>
                                @switch($order->payment_status)
                                    @case(0)
                                        <td>
                                            Not Pay
                                        </td>
                                    @break

                                    @case(1)
                                        <td>
                                            Paypal paid
                                        </td>
                                    @break

                                    @case(2)
                                        <td>
                                            Money Cash
                                        </td>
                                    @break
                                @endswitch
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
                                <td><a href="{{ route('order.detail', $order->id) }}"><button type="button"
                                            class="btn btn-xs btn-warning">View Details</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
