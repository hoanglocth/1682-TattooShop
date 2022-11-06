@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <a href="{{ route('admin.tattoo.index') }}"><button type="submit" value="submit"
                    class="button button-xs">Back</button></a>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="login_form_inner">
                        <h3>Create new tattoo</h3>
                        <form method="POST" action="{{ route('admin.tattoo.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" placeholder="Tatto name" id="name"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Image</label>
                                <input type="file" id="input-file" name="img" class="form-control""
                                    accept="image/*" />
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Artist</label>
                                <input type="text" class="form-control" placeholder="Artist" id="artist"
                                    name="artist" value="{{ old('artist') }}" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" placeholder="Price" id="price" name="price"
                                    value="{{ old('price') }}" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Descibes</label>
                                <input type="text" class="form-control" placeholder="Describes" id="describes"
                                    name="describes" value="{{ old('describes') }}" required>
                            </div>

                            <div class="col-md-12 form-group" style="margin-bottom: 60px">
                                <label for="">Category</label>
                                <select name="category" class="form-control nice-select w-100">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
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
