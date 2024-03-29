@extends('layouts.app')

@section('custom-css')
    <style>
        .percent-outer {
            width: 100%;
            height: 10px;
            background-color: rgb(204, 200, 200);
            margin-top: 2px;
            border-radius: 10px;
        }

        .percent-outer .percent-inner {
            height: 100%;
            background-color: #2ecc71;
            border-radius: 10px;
        }

        .comment-textarea {
            width: 100%;
            height: 120px;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .comment-textarea textarea {
            border-radius: 5px;
            background-color: #ffffff;
            width: 90%;
            height: 100%;
            resize: none;
        }

        .rating-label {
            cursor: pointer;
        }

        .rating-label:hover {
            color: #f1c40f;
            opacity: 0.5;
        }
    </style>
@endsection

@section('content')
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <img class="center-cropped" style="width: 30em; height:30em" src="{{ $tattoo->img }}" alt="">
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
                                <div class="col-4">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>{{ $average_evalate }} / 5</h4>
                                        <div>
                                            @php
                                                $remain = 5 - $average_evalate;
                                            @endphp

                                            @for ($i = 0; $i < (int) $average_evalate; $i++)
                                                <i class="fas fa-star" style="color: #f1c40f;"></i>
                                            @endfor
                                            @if ($average_evalate + (int) $remain != 5)
                                                <i class="fas fa-star-half-alt" style="color: #f1c40f;"></i>
                                            @endif

                                            @for ($i = 0; $i < (int) $remain; $i++)
                                                <i class="far fa-star" style="color: #f1c40f"></i>
                                            @endfor
                                        </div>
                                        <h6>({{ $count_ratings }} Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="rating_list">
                                        <h3>Based on {{ $count_ratings }} Reviews</h3>
                                        @php
                                            $percent_of_rating_decode = json_decode($percent_of_ratings);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            <div class="percent-container">
                                                <div class="row">
                                                    <div class="col-lg-2 col-2 text-center">
                                                        {{ $i }} <i class="fas fa-star"
                                                            style="color: #f1c40f;"></i></i>
                                                    </div>
                                                    <div class="col-lg-7 col-7">
                                                        <div class="percent-outer">
                                                            <div class="percent-inner"
                                                                style="width: {{ $percent_of_rating_decode[$i - 1] }}%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-3 text-center">
                                                        {{ $percent_of_rating_decode[$i - 1] }} %
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
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


                        </div>
                        <div class="col-lg-6">
                            <div class="text-center">
                                @if (!Auth::check())
                                    <a class="btn btn-warning" href="/login">Login to rating !</a>
                                @elseif ($user_rating !== null)
                                    <button class="btn btn-success" data-toggle="collapse"
                                        data-target="#comment-section">You are commented on this post , click here to
                                        edit!</button>
                                @else
                                    <button data-toggle="collapse" data-target="#comment-section" id="comment-btn">Write
                                        Comment</button>
                                @endif
                            </div>

                            <br>


                        </div>
                        @if (Auth::check())
                            <div class="col-12">
                                <div id="comment-section" class="collapse">
                                    <form action="{{ route('rating.add') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="review_box">
                                            <div>
                                                <div class="rating-section">
                                                    <table class="table text-center">
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
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            <input type="radio" name='star_number'
                                                                                value="{{ $i }}"
                                                                                id="rating-star-{{ $i }}">
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
                                                    id="tattoo_id" style="display: none;">
                                                <input type="label"
                                                    value="{{ $user_rating ? $user_rating->id : null }}" name="rating_id"
                                                    id="tattoo_id" style="display: none;">

                                                <div style="width: 100%:height: 80px">

                                                    @if ($user_rating !== null)
                                                        <button type="submit"
                                                            class="btn btn-success float-right mr-5"><b>Update</b></button>
                                                    @else
                                                        <button type="submit" class="btn btn-success float-right mr-5"
                                                            id="submit-comment"><b>Send</b></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @if ($user_rating !== null)
                                        <form action="{{ route('rating.delete') }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="{{ $tattoo->id }}">
                                            <button type="submit"
                                                class="btn btn-danger float-right mr-5"><b>Delete</b></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="col-12">
                            @if ($count_ratings > 0)
                                @foreach ($ratings as $rating)
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ asset('images/default.png') }}" class="user-avatar-comment">
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

                </div>
            </div>
        </div>
        <script>
            $("#delete_rating").on('click', function(e) {
                $('#ratingModal').modal('show');
                e.preventDefault();
            });
        </script>
    @endsection
