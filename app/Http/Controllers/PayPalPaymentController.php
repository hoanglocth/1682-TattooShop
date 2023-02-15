<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\DetailOrder;
use App\Models\Order;

class PayPalPaymentController extends Controller
{
    public function handlePayment()
    {
		$order = Order::where('status','=',2)->where('user_id','=',\Auth::user()->id)->first();
		if($order == null){
            abort(404);
		}
        if($order->payment_status != 0){
            return redirect()->route('order.confirmed');
        }
        $product = [];
        $product['invoice_id'] = (int)$order['id']+"99";
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";

        $product['items'] = [
            [
                'name' => $product['invoice_description'],
                'price' => (int)$order['price'],
                'qty' => 1,
                'des' => 'a'
            ]
        ];
        
  
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $order['price'];
        $paypalModule = new ExpressCheckout;
  
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
  
        return redirect($res['paypal_link']);
    }
   
    public function paymentCancel()
    {
        return redirect()->route('order.confirmed');
    }
  
    public function paymentSuccess(Request $request)
    {
        $order = Order::where('status','=',2)->where('user_id','=',\Auth::user()->id)->first();
		if($order == null){
            abort(404);
		}
        $order->update([
            'payment_status' => 1,
        ]);
        return redirect()->route('order.confirmed');
    }
}