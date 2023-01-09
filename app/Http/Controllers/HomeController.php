<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tattoo;
use Illuminate\Http\Request;

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
        $categories = Category::all();

        $tattoos = Tattoo::with('artists')->orderByDesc('created_at')->take(50)->get();

        return view('home', [
            'categories' => $categories,
            'tattoos' => $tattoos
        ]);
    }

}