@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <a href="{{ route('admin.trainingcourse.index') }}"><button type="submit" value="submit"
                    class="button button-xs">Back</button></a>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="login_form_inner" style="padding-top: 10px">
                        <h3 style="margin-bottom: 10px">Create new training course</h3>
                        <form method="POST" action="{{ route('admin.trainingcourse.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" placeholder="Traning course name" id="name"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Image</label>
                                <input type="file" id="input-file" name="img" class="form-control""
                                    accept="image/*" />
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Descibes</label>
                                <textarea cols="40" rows="5" class="form-control" placeholder="Describes" id="describes"
                                    name="describes"></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" placeholder="Price" id="price" name="price"
                                    value="{{ old('price') }}" required>
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <label for="">From Date - To Date</label>                               
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Schedule Description</label>
                                <input type="text" class="form-control" placeholder="Schedule" id="schedule"
                                    name="schedule"></input>
                            </div>

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
