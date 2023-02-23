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
                    <div class="register_form_inner">
                        <h3>Create an account</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger login_form mb-5">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="row login_form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ isset($data->email) ? $data->email : old('email') }}"
                                    placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    id="password" placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                    placeholder="Confirm Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Confirm Password'">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text"
                                    class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                    name="firstname"
                                    value="{{ isset($data->firstname) ? $data->firstname : old('firstname') }}"
                                    placeholder="First Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'First Name'">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text"
                                    class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"
                                    value="{{ isset($data->lastname) ? $data->lastname : old('lastname') }}"
                                    placeholder="Last Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Last Name'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text"
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                    value="{{ isset($data->address) ? $data->address : old('address') }}"
                                    placeholder="Address" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Address'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                    name="phone" value="{{ isset($data->phone) ? $data->phone : old('phone') }}"
                                    placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
                            </div>
                            <div class="col-md-12 form-group">
                                <label><i class="required"></i><i class="fas fa-venus-mars"></i>Gender</label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="gender"value="0"
                                        {{ old('gender') == 0 ? 'selected' : 0 }} required>Male
                                    <input type="radio" name="gender" value="1"
                                        {{ old('gender') == 1 ? 'selected' : 0 }} required>Female
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </label>
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
