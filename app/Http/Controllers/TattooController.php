<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Tattoo;
use Illuminate\Http\Request;

class TattooController extends Controller
{
    
	public function showTattooDetailByID($id,Request $request)
	{
		$data = Tattoo::find($id);
		if($data == null) abort(404);

		$user_rating = \Auth::check() ? $data->ratings()->where('user_id','=',\Auth::user()->id)->first() : null;
		$count_ratings = $data->ratings->count();
		$percentOfRatings = array();
		if ($count_ratings == 0) {
			for($i = 1;$i <= 5;$i++){
				array_push($percentOfRatings,0);
			}
		}else{
			for($i = 1;$i <= 5;$i++){
				array_push($percentOfRatings,round($data->ratings->where('star_number','=',$i)->count()*100/$count_ratings));
			}
		}
		$average_avalate = round($data->ratings()->avg('star_number'),1);

		$num_comment = $request->has('num_comment') ? $request->num_comment : 5;
		$num_star = $request->has('num_star') ? $request->num_star : 0;
		if($num_star == 0){
			$ratings = Rating::where('tattoo_id','=',$id)->orderBy('ratings.updated_at','DESC')->paginate($num_comment);
		}else{
			$ratings = Rating::where('tattoo_id','=',$id)->where('star_number','=',$num_star)->orderBy('ratings.updated_at','DESC')->paginate($num_comment);
		}

		return view('tattoo',[
			'tattoo' => $data,
			'ratings' => $ratings,
			'user_rating' => $user_rating,
			'percent_of_ratings' => json_encode($percentOfRatings),
			'average_evalate' => $average_avalate,
			'count_ratings' => $count_ratings,
			'num_comment' => $num_comment,
			'num_star' => $num_star,
		]);
	}
}
