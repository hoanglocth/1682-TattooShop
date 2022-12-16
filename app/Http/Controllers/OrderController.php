<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function wait(){ //1 waiting confirm
		$order = Order::where('status','=',1)->where('user_id','=',\Auth::user()->id)->first();
		if($order !== null){
			$result = Order::find($order->id)->orderdetail;
			return view('order.wait',['result' => 1,'order' => $order,'data' => $result]);
		}
		return view('order.wait',['result' => 0]);
	}

	public function confirmed(){ //2 confirm
		$order = Order::where('status','=',2)->where('user_id','=',\Auth::user()->id)->first();
		if($order !== null){
			$result = Order::find($order->id)->orderdetail;
			return view('order.confirmed',['result' => 1,'order' => $order,'data' => $result]);
		}
		return view('order.confirmed',['result' => 0]);
	}

    public function history(){ //3 finish, 4 cancel
		$orders = Order::wherein('status', [3,4])->orderBy('updated_at','DESC')->get();
		return view('order.history',['orders' => $orders]);
    }

	public function remove(request $request){
		$order = Order::find($request->id);
		if(!$order){
			return redirect()->back()->with(['class' => 'danger', 'message' => 'something wrong.']);
		}
		$order->update(['status' => 4]);
		$order->save();
		return redirect()->back()->with(['class' => 'success', 'message' => 'Cancel order id : ' . $request->id. ' success.']);
	}
}
