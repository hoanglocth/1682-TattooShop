<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    public function confirm($id){
        if($order = Order::find($id)){
            if($order->update(['status' => '2'])){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Confirm success']);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Not Found']);
    }

    
    public function finish($id){
        if($order = Order::find($id)){
            if($order['payment_status'] == 0){
                if($order->update(['status' => '3', 'payment_status' => 2])){
                    return redirect()->back()->with(['class' => 'success', 'message' => 'Confirm success']);
                }
            }else{
                if($order->update(['status' => '3'])){
                    return redirect()->back()->with(['class' => 'success', 'message' => 'Confirm success']);
                }
            }
        }
        return response()->json(['error' => 1, 'message' => 'Not Found']);
    }

    
    public function cancel($id){
        if($order = Order::find($id)){
            if($order->update(['status' => '4'])){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Confirm success']);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Not Found']);
    }

    public function detail($id){
		$order = Order::find($id);
		if(!$order){
			return redirect()->back()->with(['class' => 'danger', 'message' => 'something wrong.']);
		}
		$detail_order = DetailOrder::where('order_id', '=', $order->id)->get();
		return view('admin.order.detail', compact('detail_order','order'));
    }
}
