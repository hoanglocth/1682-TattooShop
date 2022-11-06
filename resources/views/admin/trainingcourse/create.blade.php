@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <a href="{{ route('admin.trainingcourse.index') }}"><button type="submit" value="submit"
                    class="button button-xs">Back</button></a>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="login_form_inner" style="padding-top: 10px">
                        <h3>Create new training course</h3>
                        <form method="POST" action="{{ route('admin.trainingcourse.store') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit"
                                    class="form-control button button-login w-100">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
