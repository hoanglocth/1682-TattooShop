@extends('layouts.app')

@section('content')
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1080px, 0px, 0px); transition: all 0s ease 0s; width: 2700px;">
                                <div class="owl-item cloned" style="width: 540px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="{{ $tattoo->img }}" alt="">
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 540px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="{{ $tattoo->img }}" alt="">
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 540px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="{{ $tattoo->img }}" alt="">
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 540px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="{{ $tattoo->img }}" alt="">
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 540px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="{{ $tattoo->img }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $tattoo->name }}</h3>
                        <h2>${{ $tattoo->price }}</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Category</span> :
                                    {{ $tattoo->category->name }}</a></li>
                            <li><a href="#"><span>Author</span> : {{ $tattoo->artists->name }}</a></li>
                        </ul>
                        <p>{{ $tattoo->describes }}</p>
                        <button class="button primary-btn get-tattoo-btt" data-tattoo-id="{{ $tattoo->id }}">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="product_description_area">
                <div class="nav nav-tabs" id="myTab" role="tablist">
                    <h4>Reviews</h4>
                </div>
                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>{{ $average_evalate }} / 5</h4>
                                        <h6>({{ $count_ratings }} Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on {{ $count_ratings }} Reviews</h3>
                                        <ul class="list">
                                            <li><a href="#">5 Star <i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">4 Star <i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">3 Star <i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">2 Star <i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">1 Star <i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-option">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-2 text-center" style="font-size: 1.1em">
                                            Comments
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <select class="browser-default custom-select custom-select-md"
                                            style="display: inline-block;" id="number-comment-select">
                                            <option value="5" {{ $num_comment == 5 ? 'selected' : '' }}>5 comment
                                            </option>
                                            <option value="10" {{ $num_comment == 10 ? 'selected' : '' }}>10 comment
                                            </option>
                                            <option value="15" {{ $num_comment == 15 ? 'selected' : '' }}>15 comment
                                            </option>
                                            <option value="25" {{ $num_comment == 25 ? 'selected' : '' }}>25 comment
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="browser-default custom-select custom-select-md"
                                            style="display: inline-block;" id="rating-number-select">
                                            <option value="0" {{ $num_star == 0 ? 'selected' : '' }}>Show all star
                                            </option>
                                            <option value="5" {{ $num_star == 5 ? 'selected' : '' }}>5 star</option>
                                            <option value="4" {{ $num_star == 4 ? 'selected' : '' }}>4 star</option>
                                            <option value="3" {{ $num_star == 3 ? 'selected' : '' }}>3 star</option>
                                            <option value="2" {{ $num_star == 2 ? 'selected' : '' }}>2 star</option>
                                            <option value="1" {{ $num_star == 1 ? 'selected' : '' }}>1 star</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="review_list">
                                @if ($count_ratings > 0)
                                    @foreach ($ratings as $rating)
                                        <div class="review_item">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/default.png') }}"
                                                        class="user-avatar-comment">
                                                </div>
                                                <div class="media-body">
                                                    <h4>{{ $rating->user->firstname }}</h4>
                                                    Commented
                                                    at {{ get_timeago($rating->updated_at) }}
                                                    <div style="width: 100%;font-weight: bold" class="mt-2">
                                                        @php
                                                            $remaining_rating = 5 - $rating->star_number;
                                                        @endphp

                                                        @for ($i = 1; $i <= $rating->star_number; $i++)
                                                            <i class="fas fa-star" style="color: #f1c40f"></i>
                                                        @endfor

                                                        @for ($i = 1; $i <= $remaining_rating; $i++)
                                                            <i class="fas fa-star" style="color: darkgray"></i>
                                                        @endfor

                                                        @if ($rating->star_number == 1)
                                                            <b> Angry</b>
                                                        @elseif ($rating->star_number == 2)
                                                            <b> Disappointed</b>
                                                        @elseif ($rating->star_number == 3)
                                                            <b> Neutral</b>
                                                        @elseif ($rating->star_number == 4)
                                                            <b> Good</b>
                                                        @elseif ($rating->star_number == 5)
                                                            <b> Excellent</b>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <p readonly>{{ $rating->comment }}</p>
                                        </div>
                                        <br>
                                    @endforeach
                                    <div style="width: 100%;display: flex;justify-content: center;align-items: center">
                                        {!! $ratings->appends(['num_comment' => $num_comment, 'num_star' => $num_star])->links() !!}
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <li>No Comment in this tattoo, will be the first rating in this tattoo !</li>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="text-center">
                                @if (!Auth::check())
                                    <a class="btn btn-warning" href="/login">Login to rating !</a>
                                @elseif ($user_rating !== null)
                                    <button class="btn btn-success" data-toggle="collapse"
                                        data-target="#comment-section">You are commented on this book , click here to
                                        edit!</button>
                                @else
                                    <button data-toggle="collapse" data-target="#comment-section" id="comment-btn">Write
                                        Comment</button>
                                @endif
                            </div>

                            <br>
                            @if (Auth::check())
                                <form action="{{ route('rating.add') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div id="comment-section" class="collapse">
                                        <div class="review_box">
                                            <div>
                                                <div class="rating-section">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Angry</th>
                                                                <th>Disappointed</th>
                                                                <th>Neutral</th>
                                                                <th>Good</th>
                                                                <th>Excellent</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($user_rating && $user_rating->star_number == $i)
                                                                        <td>
                                                                            <input type="radio" name='star_number'
                                                                                value="{{ $i }}"
                                                                                id="rating-star-{{ $i }}"
                                                                                checked>
                                                                            <label for="rating-star-{{ $i }}"
                                                                                class="rating-label"><i
                                                                                    class="fas fa-star"></i></label>
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            <input type="radio" name='star_number'
                                                                                value="{{ $i }}"
                                                                                id="rating-star-{{ $i }}">
                                                                            <label for="rating-star-{{ $i }}"
                                                                                class="rating-label"><i
                                                                                    class="fas fa-star"></i></label>
                                                                        </td>
                                                                    @endif
                                                                @endfor
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="comment-textarea">
                                                    <textarea name="comment" placeholder="Comment this b" id="comment-text-content">{{ $user_rating == null ? '' : $user_rating->comment }} </textarea>
                                                </div>

                                                <br>

                                                <input type="label" value="{{ $tattoo->id }}" name="tattoo_id"
                                                    id="tattoo_id" style="display: none;">
                                                <input type="label" value="{{ Auth::user()->id }}" name="user_id"
                                                    id="book-id" style="display: none;">
                                                <input type="label"
                                                    value="{{ $user_rating ? $user_rating->id : null }}" name="rating_id"
                                                    id="book-id" style="display: none;">

                                                <div style="width: 100%:height: 80px">

                                                    @if ($user_rating !== null)
                                                        <button id="delete_rating"
                                                            class="btn btn-danger float-right mr-5">Delete</button>
                                                        <button type="submit"
                                                            class="btn btn-success float-right mr-5"><b>Update</b></button>
                                                    @else
                                                        <button type="submit" class="btn btn-success float-right mr-5"
                                                            id="submit-comment"><b>Send</b></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="modal fade" tabindex="-1" role="dialog" id="ratingModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You submit delete rating ?&hellip;</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="{{ $tattoo->id }}">
                                                    <button type="submit"
                                                        class="btn btn-danger float-right mr-5"><b>Delete</b></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    @endsection
