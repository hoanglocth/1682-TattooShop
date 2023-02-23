<section class="lattest-product-area pb-40 category-list">
    <div class="row">
        @foreach ($tattoos as $key => $tattoo)
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
</section>
<!-- End Best Seller -->
<div style="width: 100%;" class="d-flex justify-content-center">
    {!! $tattoos->appends(request()->query())->links('vendor.pagination.bootstrap-4') !!}
</div>