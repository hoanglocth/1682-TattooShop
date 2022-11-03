@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">

        <div class="container">
            <a href="{{ route('admin.category.index') }}"><button type="submit" value="submit"
                    class="button button-xs">Back</button></a>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this
                                is the</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Create new category</h3>
                        <form method="POST" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span style="display: block" class="invalid-feedback" role="alert">
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
