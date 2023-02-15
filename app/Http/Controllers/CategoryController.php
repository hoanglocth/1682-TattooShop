<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tattoo;

class CategoryController extends Controller
{
    
    public function index($category_id,Request $request)
    {

        $cate= Category::find($category_id);
        if(!$cate) abort(404);

        $categories= Category::whereHas('tattoos', function($query) {
            $query->where('name' ,'!=' ,null  );
        }, '>', 0)->get();

        $paginate = isset($request->paginate) ? $request->paginate : 9;
        
        $orderby= isset($request->orderby) ? $request->orderby: 0;

        switch ($orderby) {
            case 1:  //name Z-A
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('name','DESC')->paginate($paginate);
            break;
            case 2: // newest
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('created_at','DESC')->paginate($paginate);
            break;
            case 3: //oldest
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('created_at')->paginate($paginate);
            break;
            case 4: //rating up
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderBy('average_rating')->paginate($paginate);
            break;
            case 5: //rating down
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderByDesc('average_rating')->paginate($paginate);
            break;
            default: //name A-Z
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('name')->paginate($paginate);
            break;
        }

        if($data->toArray()['total'] == 0 || $data == null){
            return abort(404);
        }

        return view('category',[
            'tattoos' => $data,
            'categories' => $categories,
            'cate' => $cate,
            'page_selection' => $paginate,
            'orderby' => $orderby
        ]);
    }

    public function listTatooPaginate(Request $request){
        $category_id = $request->category;
        $paginate = $request->pagination;
        $orderby= isset($request->orderby) ? $request->orderby: 0;
        switch ($orderby) {
            case 1:  //name Z-A
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('name','DESC')->paginate($paginate);
            break;
            case 2: // newest
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('created_at','DESC')->paginate($paginate);
            break;
            case 3: //oldest
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('created_at')->paginate($paginate);
            break;
            case 4: //rating up
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderBy('average_rating')->paginate($paginate);
            break;
            case 5: //rating down
            $data = Tattoo::with('artists')->withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderByDesc('average_rating')->paginate($paginate);
            break;
            default: //name A-Z
            $data = Tattoo::with('artists')->where('category_id','=',$category_id)->orderBy('name')->paginate($paginate);
            break;
        }
        return view('layouts.tatoos',[
           'tattoos' => $data,
           'page_selection' => $paginate,
           'orderby' => $request->orderby
       ]);
    }
}
