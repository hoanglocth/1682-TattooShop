@extends('layouts.app')

@section('content')
    <section class="login_box_area section-margin">
        <div class="container">
            <a href="{{ route('admin.tattoo.index') }}"><button type="submit" value="submit"
                    class="button button-xs">Back</button></a>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="login_form_inner" style="padding-top: 10px">
                        <h3 style="margin-bottom: 10px">Create new tattoo</h3>
                        <form method="POST" action="{{ route('admin.tattoo.update', $tattoo->id ) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" placeholder="Tatto name" id="name"
                                    name="name" value="{{ $tattoo->name }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Image</label>
                                <input type="file" id="input-file" name="img" class="form-control""
                                    accept="image/*" />
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" placeholder="Price" id="price" name="price"
                                    value="{{ $tattoo->price }}" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Descibes</label>
                                <textarea cols="40" rows="5" class="form-control" placeholder="Describes" id="describes"
                                    name="describes">{{ $tattoo->describes }}</textarea>
                            </div>

                            <div class="col-md-12 form-group" style="margin-bottom: 60px">
                                <label for="">Artist</label>
                                <select name="artist" class="form-control nice-select w-100">
                                    @foreach ($artists as $artist)
                                        <option value="{{ $artist->id }}" {{$tattoo->artist_id == $artist->id ? 'selected' : ''}}>{{ $artist->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group" style="margin-bottom: 60px">
                                <label for="">Category</label>
                                <select name="category" class="form-control nice-select w-100">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{$tattoo->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit"
                                    class="form-control button button-login w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
