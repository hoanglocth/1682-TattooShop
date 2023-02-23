@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Category {{ $cate->name }}</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form action="#">
                                <ul class="list-group a">

                                    @foreach ($categories as $category)
                                        <a href="{{ route('category', $category->id) }}">
                                            <li class="filter-list {{ $category->id == $cate->id ? 'active' : '' }}">
                                                {{ $category->name }}
                                            </li>
                                        </a>
                                    @endforeach

                                </ul>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <form data-category-id="{{ $tattoos[0]->category->id }}"
                    class="filter-bar d-flex flex-wrap align-items-center" id="options">
                    <div class="sorting">
                        <select class="browser-default custom-select custom-select-md" style="display: inline;"
                            id="orderby-select">
                            <option {{ $orderby == 0 ? 'selected' : '' }} value="0">A-Z</option>
                            <option {{ $orderby == 1 ? 'selected' : '' }} value="1">Z-A</option>
                            <option {{ $orderby == 2 ? 'selected' : '' }} value="2">Newest</option>
                            <option {{ $orderby == 3 ? 'selected' : '' }} value="3">Oldest</option>
                            <option {{ $orderby == 4 ? 'selected' : '' }} value="4">Rating up</option>
                            <option {{ $orderby == 5 ? 'selected' : '' }} value="5">Rating down</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select class="browser-default custom-select custom-select-md" style="display: inline;"
                            id="pagination-select">
                            <option {{ $page_selection == 9 ? 'selected' : '' }} value="9">Default
                            </option>
                            <option {{ $page_selection == 12 ? 'selected' : '' }} value="12">Show 12
                            </option>
                            <option {{ $page_selection == 15 ? 'selected' : '' }} value="15">Show 15
                            </option>
                            <option {{ $page_selection == 18 ? 'selected' : '' }} value="18">Show 18
                            </option>
                            <option {{ $page_selection == 21 ? 'selected' : '' }} value="21">Show 21
                            </option>
                        </select>
                    </div>
                    <div style="margin-top: 10px">
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-secondary">Update</button>
                        </div>
                    </div>
                </form>
                <!-- Start Best Seller -->
                <div id="paginate">
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            @foreach ($tattoos as $key => $tattoo)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card text-center card-product">
                                        <div class="card-product__img">
                                            <a href="{{ route('tattoo', $tattoo->id) }}"><img class="card-img"
                                                    src="{{ $tattoo->img }}" alt=""></a>
                                            <ul class="card-product__imgOverlay">
                                                <li><button
                                                        onclick="window.location='{{ route('tattoo', $tattoo->id) }}'"><i
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
                    </section>
                    <!-- End Best Seller -->
                    <div style="width: 100%;" class="d-flex justify-content-center">
                        {!! $tattoos->appends(request()->query())->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $("form#options").submit(function(event) {
                event.preventDefault();
                let orderby = $("select#orderby-select").val();
                let paginate = $("select#pagination-select").val();
                let categoryId = $(this).attr("data-category-id");
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: 'POST',
                    url: '/category/' + categoryId,
                    data: {
                        'category': categoryId,
                        'pagination': paginate,
                        'orderby': orderby,
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
