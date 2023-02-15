<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Tattoo;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    	$orders = Order::all();
    	$tattoos = Tattoo::all();
    	$users = User::all();
    	$comments = Rating::orderBy('id', 'DESC')->get();
    	return view('admin.index', compact('orders', 'tattoos', 'users', 'comments'));
    }
}
