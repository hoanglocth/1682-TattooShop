@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('user.layouts.menu')
            </div>
            <div class="col-9 infocontainer">
                <h1>Orders Detail ID: {{ $order->id }}</h1>
                <table id="example" class="display text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tattoo</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Artist</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail_order as $do)
                            <tr>
                                <td>{{ $do->tattoo->name }}</td>
                                <td>{{ number_format($do->tattoo->price) }} VND</td>
                                <td>{{ $do->tattoo->category->name }}</td>
                                <td>{{ $do->tattoo->artists->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
