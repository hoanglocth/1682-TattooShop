<?php

namespace App\Http\Controllers;

use App\Models\Tattoo;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function index(){
		return view('cart');
	}

	public function add($tattoo_id){
		$tattoo = Tattoo::find($tattoo_id);
		if(!$tattoo){
			return -1;
		}
		$cart = session()->get('cart');
		$total = session()->get('total');
		if(isset($cart[$tattoo_id])) return -2;
		if (is_array($cart) && count($cart) == 5) {
			return -3;
		}
		if(!$cart){
			$cart = [];
		}
		if(!$total){
			$total = 0;
		}
		$cart[$tattoo_id] = [
			"name" => $tattoo->name,
			"price" => $tattoo->price,
			"img" => $tattoo->img,
			"id" => $tattoo_id,
			"category_id" => $tattoo->category->id,
			"category" => $tattoo->category->name,
			"des" => $tattoo->describes
		];
		$total += $tattoo->price;
		session()->put("cart",$cart);
		session()->put("total",$total);
		return 1;
	}

	public function remove(request $request){
		$tattoo_id = $request->id;
		if($tattoo_id){
			$cart = session()->get('cart');
			$total = session()->get('total');
			if(isset($cart[$tattoo_id])){
				$total -= $cart[$tattoo_id]['price'];
				unset($cart[$tattoo_id]);
				session()->put('cart',$cart);
				session()->put('total',$total);
				return redirect()->back()->with(['class' => 'success', 'message' => 'Delete success.']);
			}
		}
		return redirect()->back()->with(['class' => 'danger', 'message' => 'Something wrong.']);
	}

	public function submit(Request $request){
		if($request->booking_date){

			$cart = session()->get('cart');
			$total = session()->get('total');
			if(!($cart || $total)) return redirect()->back()->with(['class' => 'danger', 'message' => 'Something wrong.']);
			
			DB::beginTransaction();
			try {
				$order = DB::table('orders')->insertGetId(['status' => 1,'price' => $total,'user_id' => \Auth::user()->id,'created_at' => now(),'updated_at' => now(),'booking_date' => $request->booking_date]);
				foreach($cart as $c){
					DB::table('detail_orders')->insert(['order_id' => $order,'tattoo_id' => $c["id"],'created_at' => now(),'updated_at' => now()]);
				}
				DB::commit();
			} catch (Exception $e) {
				DB::rollBack();
				throw new Exception($e->getMessage());
			}
			session()->forget('cart');
			session()->forget('total');
			return redirect()->back()->with(['class' => 'success', 'message' => 'Your cart is submited, wait for admin check !']);
		}
		return redirect()->back()->with(['class' => 'danger', 'message' => 'Choose date']);
	}
}
