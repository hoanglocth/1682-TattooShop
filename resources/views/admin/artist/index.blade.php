@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Artists Management</h1>
                </div>
            </div>
            <a href="{{ route('admin.artist.create') }}"><button type="submit" value="submit" class="button">Create
                    artist</button></a>
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
