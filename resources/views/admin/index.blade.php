@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="blog-banner" style="margin-bottom: 30px">
            <div class="text-center">
                <h1>Dashboard</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="col"><em class="fa fa-xl fa-image color-blue"></em>
                            <div class="large">{{ $tattoos->count() }}</div>
                            <div class="text-muted">Tattoos</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="col"><em class="fa fa-xl fa-comments color-blue"></em>
                            <div class="large">{{ $comments->count() }}</div>
                            <div class="text-muted">Comments</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="col"><em class="fa fa-xl fa-users color-blue"></em>
                            <div class="large">{{ $users->count() }}</div>
                            <div class="text-muted">Users</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="col"><em class="fa fa-xl fa-clipboard color-blue"></em>
                            <div class="large">{{ $orders->count() }}</div>
                            <div class="text-muted">Orders</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!--/.row-->
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Unconfirmed orders</h4>
                            <div class="easypiechart" id="easypiechart-orange" data-percent="{!! percent($orders->count(), $orders->where('status', 1)->count()) !!}"><span
                                    class="percent">{!! $orders->where('status', 1)->count() !!}/{!! $orders->count() !!}</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Orders confirmed</h4>
                            <div class="easypiechart" id="easypiechart-blue" data-percent="{!! percent($orders->count(), $orders->where('status', 2)->count()) !!}"><span
                                    class="percent">{!! $orders->where('status', 2)->count() !!}/{!! $orders->count() !!}</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Orders finished</h4>
                            <div class="easypiechart" id="easypiechart-teal" data-percent="{!! percent($orders->count(), $orders->where('status', 3)->count()) !!}"><span
                                    class="percent">{!! $orders->where('status', 3)->count() !!}/{!! $orders->count() !!}</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Orders cancel</h4>
                            <div class="easypiechart" id="easypiechart-red" data-percent="{!! percent($orders->count(), $orders->where('status', 4)->count()) !!}"><span
                                    class="percent">{!! $orders->where('status', 4)->count() !!}/{!! $orders->count() !!}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.main-->
@endsection
