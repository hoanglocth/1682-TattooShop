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
                        <a href="{{ route('tattoo', $tattoo->id) }}"><img class="card-img" src="{{ $tattoo->img }}"
                                alt=""></a>

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
        {!! $data->appends(['orderby' => $orderby, 'category' => $category, 'keysearch' => $key, 'paginate' => $paginate])->links('vendor.pagination.bootstrap-4') !!}
    </div>
@else
    <div class="alert alert-warning alert-dismissible fade show">
        <li>Nothing to show, please input key to search more books !</li>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
