@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-sm-12 col-12">
                <div class="category-list">
                    <p class="list-group-item cat-item text-left" style="background-color: #343a40;color: white">Categories
                    </p>
                    <ul class="list-group">

                        @foreach ($categories as $category)
                            <a href="{{ route('category', $category->id) }}">
                                <li class="list-group-item cat-item">
                                    {{ $category->name }}
                                </li>
                            </a>
                        @endforeach

                    </ul>
                </div>

                <div class="select_option">
                    <p class="list-group-item cat-item text-left mt-4" style="background-color: #343a40;color: white">
                        Options</p>
                    <form data-category-id="{{ $tattoos[0]->category->id }}" id="options">
                        <div class="form-group">
                            <label for="" class="mt-2">Number</label>
                            <select class="browser-default custom-select custom-select-md" style="display: inline;"
                                id="pagination-select">
                                <option {{ $page_selection == 10 ? 'selected' : '' }} value="10">Show 10
                                </option>
                                <option {{ $page_selection == 15 ? 'selected' : '' }} value="15">Show 15
                                </option>
                                <option {{ $page_selection == 20 ? 'selected' : '' }} value="20">Show 20
                                </option>
                                <option {{ $page_selection == 25 ? 'selected' : '' }} value="25">Show 25
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Group By</label>
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
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="section-intro pb-60px">
                    <h2>Category <span class="section-intro__style">{{ $cate->name }}</span></h2>
                </div>
                <div id="paginate">
                    <div class="row">
                        @foreach ($tattoos as $key => $tattoo)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="{{ $tattoo->img }}">
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('tattoo',$tattoo->id) }}"><b></b>{{$tattoo->name}}</a>
                                        <p>Design by {{ $tattoo->artists->name }}</p>
                                        <p class="card-product__price">{{ $tattoo->price }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <button class="get-tattoo-btt" data-tattoo-id="{{ $tattoo->id }}">
                                            Add to card
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
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
