@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('user.layouts.menu')
            </div>
            <div class="col-9">
                <h2>Confirmed order</h2>
                @if ($result == 0)
                    <li>No data available in here</li>
                @else
                    <h4>Order number :{{ $order->id }}</h4>
                    <h4>Payment Status :{{ ($order->payment_status == 0) ? 'Not pay' : 'Paid' }}</h4>
                    <div class="alert alert-success">
                        <p>Go to tattoo store to tatoo now!</p>
                    </div>
                    @php
                        $date = date('Y-m-d H:i:s', strtotime('+24 hours', strtotime($order->updated_at)));
                    @endphp
                    @if ($date <= now())
                        <div class="alert alert-danger">
                            <p>Your order has been overdue, contact admin to process!</p>
                        </div>
                    @else
                        <div id="DateCountdown" data-date="{{ $date }}" style="width: 100%;"></div>
                    @endif
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:60%">Tattoo</th>
                                <th style="width:20%">Category</th>
                                <th style="width:20%" class="text-center">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $orderdetails)
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-2 hidden-xs"><img src="{{ $orderdetails->tattoo->img }}"
                                                    alt="..." class="img-responsive" height="100px" width="70px" />
                                            </div>
                                            <div class="col-sm-10">
                                                <h4><a class="nomargin" href="">{{ $orderdetails->tattoo->name }}</a>
                                                </h4>
                                                <p>Describes : {{ substr($orderdetails->tattoo->describes, 0, 90) }} ...</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="">{{ $orderdetails->tattoo->category->name }}</a>
                                    </td>
                                    <td class="text-center">{{ number_format($orderdetails->tattoo->price) }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @switch($order->payment_status)
                        @case(0)
                            <a href="{{ route('make.payment') }}" class="btn btn-primary mt-3">Pay {{ $order->price }}$ via Paypal</a>
                            @break
                    @endswitch
                @endif
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript" src="{{ asset('js/TimeCircles.js') }}"></script>
    <script>
        $('#myForm').on('submit', function(e) {
            $('#myModal').modal('show');
            e.preventDefault();
        });
        $("#DateCountdown").TimeCircles({
            "animation": "smooth",
            "bg_width": 1.2,
            "fg_width": 0.1,
            "circle_bg_color": "#60686F",
            "time": {
                "Days": {
                    "text": "Days",
                    "color": "#FFCC66",
                    "show": true
                },
                "Hours": {
                    "text": "Hours",
                    "color": "#99CCFF",
                    "show": true
                },
                "Minutes": {
                    "text": "Minutes",
                    "color": "#BBFFBB",
                    "show": true
                },
                "Seconds": {
                    "text": "Seconds",
                    "color": "#FF9999",
                    "show": true
                }
            }
        });
    </script>
@endsection
