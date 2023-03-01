@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head" style="background-color: #e74c3c;color: white">Options</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form id="options_search">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" id="keysearch" class="form-control" placeholder="search"
                                        value={{ isset($key) ? $key : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="category-select">Category</label>
                                    <select class="form-control" id="category-select">
                                        <option {{ $category == -1 ? 'selected' : '' }} value="-1">All</option>
                                        @foreach ($categories as $cate)
                                            <option {{ $category == $cate->id ? 'selected' : '' }}
                                                value="{{ $cate->id }}">
                                                {{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Count</label>
                                    <select class="form-control" id="paginate-select">
                                        <option {{ $paginate == 12 ? 'selected' : '' }} value="12">Show 12 </option>
                                        <option {{ $paginate == 15 ? 'selected' : '' }} value="15">Show 15 </option>
                                        <option {{ $paginate == 18 ? 'selected' : '' }} value="18">Show 18 </option>
                                        <option {{ $paginate == 21 ? 'selected' : '' }} value="21">Show 21 </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">search</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-7">
                <ol class="breadcrumb">
                    <h5>Result</h5>
                </ol>
                <div id="paginate">
                    @if ($data != null)
                        <div class="alert alert-success alert-dismissible fade show">
                            <li>Found {{ $data->toArray()['total'] }} results with " {{ $key }} "</li>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row" style="margin-top: 30px" id="product-container">
                            @foreach ($data as $tattoo)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card text-center card-product">
                                        <div class="card-product__img">
                                            <a href="{{ route('tattoo', $tattoo->id) }}"><img class="card-img"
                                                    src="{{ $tattoo->img }}" alt=""></a>

                                            <ul class="card-product__imgOverlay">
                                                <li><button onclick="window.location='{{ route('tattoo', $tattoo->id) }}'"><i
                                                    class="ti-search"></i></button></li>
                                                <li><button class="get-tattoo-btt" data-tattoo-id="{{ $tattoo->id }}"><i
                                                            class="ti-shopping-cart"></i></button></li>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <p>Design by {{ $tattoo->artists->name }}</p>
                                            <h4 class="card-product__title"><a
                                                    href="{{ route('tattoo', $tattoo->id) }}">{{ $tattoo->name }}</a></h4>
                                            <p class="card-product__price">${{ $tattoo->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-center">
                            {!! $data->appends(request()->query())->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                    @else
                        <div class="alert alert-warning alert-dismissible fade show">
                            <li>Nothing to show, please input key to search more tattoo !</li>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection