<div class="row">
    @foreach ($tattoos as $key => $tattoo)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
                <div class="card-product__img">
                    <img class="card-img" src="{{ $tattoo->img }}">
                </div>
                <div class="card-body">
                    <p>{{ $tattoo->name }}</p>
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