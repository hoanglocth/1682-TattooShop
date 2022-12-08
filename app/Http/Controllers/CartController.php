<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
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

	public function submit_cart(){
		$cart = session()->get('cart');
		$total = session()->get('total');
		if(!($cart || $total)) return redirect()->back()->with(['class' => 'danger', 'message' => 'Something wrong.']);
		//Dang muon sach theo mot don hang khac
		$ordering = Order::where('user_id','=',\Auth::user()->id)->wherein('status', [1,2,4])->get();
		if (count($ordering) >= 1) {
			switch ($ordering[0]->status) {
				case 1:
				$message = "You are watting admin submit orther cart !";
				break;
				case 2:
				$message = "You are have orther cart, please go to library to receive tattoo !";
				break;
				case 4:
				$message = "You are borrowing tattoos, go to library give tattoo back to order orther cart";
				break;
				default:
				$message = "Something when wrong ,contact admin to support !";
				break;
			}
			return redirect()->back()->with(['class' => 'warning', 'message' => $message]);
		}
		if(Auth::user()->account_expiry_date < now()){
			return redirect()->back()->with(['class' => 'danger', 'message' => "Can't submit cart because your account has been expiry"]);
		}
		DB::beginTransaction();
		try {
			$order = DB::table('order')->insertGetId(['status' => 1,'price' => $total,'user_id' => \Auth::user()->id,'created_at' => now(),'updated_at' => now()]);
			foreach($cart as $c){
				DB::table('detail_order')->insert(['order_id' => $order,'tattoo_id' => $c["id"],'created_at' => now(),'updated_at' => now()]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollBack();
			throw new Exception($e->getMessage());
		}
		session()->forget('cart');
		session()->forget('total');
		return redirect()->back()->with(['class' => 'success', 'message' => 'Your cart is submited, wait for admin check and go to library to get tattoo !']);
	}
}
