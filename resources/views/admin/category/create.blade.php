@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <a href="{{ route('admin.category.index') }}"><button type="submit" value="submit"
                    class="button button-xs">Back</button></a>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="login_form_inner" style="padding-top: 10px">
                        <h3 style="margin-bottom: 10px">Create new category</h3>
                        <form method="POST" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="col-md-12 form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Category name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="button button-login w-100">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
