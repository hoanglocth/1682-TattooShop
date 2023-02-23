<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rating;
use App\Models\Tattoo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TattooController extends Controller
{
    public function index(Request $request)
    {
        $categories= Category::whereHas('tattoos', function($query) {
            $query->where('name' ,'!=' ,null  );
        }, '>', 0)->get();
		$paginate = isset($request->paginate) ? $request->paginate : 9;
        $tattoos = Tattoo::with('artists')->orderByDesc('created_at')->paginate($paginate);
		$orderby= isset($request->orderby) ? $request->orderby: 0;

        switch ($orderby) {
            case 1:  //name Z-A
            $data = Tattoo::with('artists')->orderBy('name','DESC')->paginate($paginate);
            break;
            case 2: // newest
            $data = Tattoo::with('artists')->orderBy('created_at','DESC')->paginate($paginate);
            break;
            case 3: //oldest
            $data = Tattoo::with('artists')->orderBy('created_at')->paginate($paginate);
            break;
            case 4: //rating up
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->orderBy('average_rating')->paginate($paginate);
            break;
            case 5: //rating down
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->orderByDesc('average_rating')->paginate($paginate);
            break;
            default: //name A-Z
            $data = Tattoo::with('artists')->orderBy('name')->paginate($paginate);
            break;
        }

        if($data->toArray()['total'] == 0 || $data == null){
            return abort(404);
        }
        return view('tattoo.index', [
            'categories' => $categories,
            'tattoos' => $tattoos,
            'page_selection' => $paginate,
            'orderby' => $orderby
        ]);
    }
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

	
    public function listTatooPaginate(Request $request){
        $paginate = $request->pagination;
        $orderby= isset($request->orderby) ? $request->orderby: 0;
        switch ($orderby) {
            case 1:  //name Z-A
            $data = Tattoo::with('artists')->orderBy('name','DESC')->paginate($paginate);
            break;
            case 2: // newest
            $data = Tattoo::with('artists')->orderBy('created_at','DESC')->paginate($paginate);
            break;
            case 3: //oldest
            $data = Tattoo::with('artists')->orderBy('created_at')->paginate($paginate);
            break;
            case 4: //rating up
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->orderBy('average_rating')->paginate($paginate);
            break;
            case 5: //rating down
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->orderByDesc('average_rating')->paginate($paginate);
            break;
            default: //name A-Z
            $data = Tattoo::with('artists')->orderBy('name')->paginate($paginate);
            break;
        }
        return view('layouts.tatoos',[
           'tattoos' => $data,
           'page_selection' => $paginate,
           'orderby' => $request->orderby
       ]);
    }
}
