@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div id="sidebar-collapse" class="sidebar">
                    <p class="list-group-item cat-item text-left" style="background-color: #e74c3c;color: white">Options</p>
                    <form id="options_search" style="padding: 23px;">
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
                                    <option {{ $category == $cate->id ? 'selected' : '' }} value="{{ $cate->id }}">
                                        {{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Count</label>
                            <select class="form-control" id="paginate-select">
                                <option {{ $paginate == 10 ? 'selected' : '' }} value="10">Show 10 </option>
                                <option {{ $paginate == 15 ? 'selected' : '' }} value="15">Show 15 </option>
                                <option {{ $paginate == 20 ? 'selected' : '' }} value="20">Show 20 </option>
                                <option {{ $paginate == 25 ? 'selected' : '' }} value="25">Show 25 </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">search</button>
                    </form>
                </div>
            </div>
            <div class="col-9 infocontainer">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">
                            <i class="fas fa-home"></i>
                        </a></li>
                    <li class="breadcrumb-item active">search</li>
                </ol>
                <div id="paginate">
                    @if ($data != null)
                        <div class="alert alert-success alert-dismissible fade show">
                            <li>Found {{ $data->toArray()['total'] }} results with " {{ $key }} "</li>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row" id="product-container">
                            @foreach ($data as $tattoo)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card text-center card-product">
                                        <div class="card-product__img">
                                            <a href="{{ route('tattoo', $tattoo->id) }}"><img class="card-img"
                                                    src="{{ $tattoo->img }}" alt=""></a>

                                            <ul class="card-product__imgOverlay">
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
                        <hr>
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

@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#keysearch').keyup(function() {
                let categoryId = $("select#category-select").val();
                let orderby = $("select#groupby-select").val();
                let paginate = $("select#paginate-select").val();
                let keysearch = $("input#keysearch").val();
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: 'POST',
                    url: '/search/ajax',
                    data: {
                        'keysearch': keysearch,
                        'category': categoryId,
                        'orderby': orderby,
                        'paginate': paginate,
                        '_token': token
                    },
                    success: function(data) {
                        $("#paginate").empty().append($(data).hide().fadeIn(500));
                    },
                    error: function(jqXHR, exception) {
                        console.log(jqXHR.responseText);
                    }
                });
            });
        });
    </script>
@endsection
