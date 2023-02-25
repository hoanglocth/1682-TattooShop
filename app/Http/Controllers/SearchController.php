<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tattoo;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $cate = Category::whereHas('tattoos', function ($query) {
            $query->where('name', '!=', null);
        }, '>', 0)->get();
        $category_id = (isset($request->category)) ? $request->category : -1;
        $orderby = (isset($request->orderby)) ? $request->orderby : 0;
        $paginate = (isset($request->paginate)) ? $request->paginate : 9;
        if ($request->keysearch == null) {
            return view('search', [
                'categories' => $cate,
                'data' => null,
                'category' => $category_id,
                'orderby' => $orderby,
                'paginate' => $paginate
            ]);
        }

        $tattoo = Tattoo::where('name', 'like', '%' . $request->keysearch . '%');
        if ($category_id >= 0) {
            $tattoo = $tattoo->where('category_id', '=', $category_id);
        }

        $tattoo = $tattoo->paginate($paginate);

        return view('search', [
            'key' => $request->keysearch,
            'categories' => $cate,
            'data' => $tattoo,
            'category' => $category_id,
            'orderby' => $orderby,
            'paginate' => $paginate
        ]);
    }



    public function searchAjax(Request $request)
    {
        $category_id = $request->category;
        $orderby = $request->orderby;
        $paginate = $request->paginate;
        if ($request->keysearch == "")
            return view('layouts.search_section', [
                'key' => null,
                'data' => null,
                'category' => $category_id,
                'orderby' => $orderby,
                'paginate' => $paginate
            ]);
        $tattoos = Tattoo::with('artists');
        if ($category_id >= 0) {
            $tattoos = $tattoos->where('category_id', '=', $category_id);
        }
        if ($orderby == 0) {
            $tattoos = $tattoos->where('name', 'like', '%' . $request->keysearch . '%')->paginate($paginate);
        } else {
            $tattoos = $tattoos->where('name', 'like', '%' . $request->keysearch . '%')->paginate($paginate);
        }
        return view('layouts.search_section', [
            'key' => $request->keysearch,
            'data' => $tattoos,
            'category' => $category_id,
            'orderby' => $orderby,
            'paginate' => $paginate
        ]);
    }
}