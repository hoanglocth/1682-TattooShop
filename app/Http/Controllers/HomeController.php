<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tattoo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tattoos = Tattoo::with('artists')->orderByDesc('created_at')->take(8)->get();

        $top_tattoos = Tattoo::withCount([
            'ratings as average_rating' => function ($query) {
                $query->select(\DB::raw('coalesce(avg(star_number),0)'));
            }
        ])->orderByDesc('average_rating')->take(8)->get();

        return view('home', [
            'tattoos' => $tattoos,
            'top_tattoos' => $top_tattoos
        ]);
    }

}