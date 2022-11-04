@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <h1>List Tattooes</h1>
            <a href="{{ route('admin.tattoo.create') }}"><button type="submit" value="submit"
                    class="button">Create tattoo</button></a>
            <div class="row">
                <div class="col-lg-12">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush


    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @stack('scripts')
@endsection