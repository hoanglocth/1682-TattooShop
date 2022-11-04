@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <h4>Already have an account?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this
                                is the</p>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Create an account</h3>
                        <form class="row login_form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ isset($data->email) ? $data->email : old('email') }}""
                                    placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                @error($errors->has('email'))
                                    <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" id="password"
                                    placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                @error($errors->has('password'))
                                    <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control"
                                    name="confirm_password" id="confirm_password"
                                    placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                                @error($errors->has('confirm_password'))
                                    <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="button button-register w-100">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
