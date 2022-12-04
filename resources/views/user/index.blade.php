==@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row accountcontainer">
                <div class="col-3">
                    @include('user.layouts.menu')
                </div>
                <div class="col-9 infocontainer">
                    <h1 class="page-header">Info Account</h1>
                    <div class="panel panel-default">
                        <div class="tab-content ml-1" id="myTabContent">
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Full Name</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ Auth::user()->lastname }} {{ Auth::user()->firstname }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">E-Mail</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Phone</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Address</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ Auth::user()->address }}
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
