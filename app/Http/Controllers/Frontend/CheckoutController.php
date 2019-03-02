<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Cart;
use Auth;
use Session;
use App\User;
use Carbon\Carbon;
use App\Jobs\SendOrderEmail;
use App\Jobs\SendVerificationEmail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    //
    public function index() {
        $cart = Cart::count();
        if($cart) {

            $auth = Auth::user();
            if($auth) {
                $data['user'] = User::find($auth->customers_id);
                $data['address_book'] = \DB::table('address_book')->where('customers_id', $data['user']->customers_id)->first();
                return view('frontend.checkout', compact('data'));    
            }

            return view('frontend.checkout');
        }
        return redirect('cart');
    }

    public function payment() {
        return view('frontend.payment');
    }

    public function checkout(Request $request) {
        $order = Order::orderBy('orders_id', 'DESC')->first();
        $invoice_number = "EOS" .$order->orders_id. str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $input = $request->except('_token');
        $input['invoice_number'] = $invoice_number;
        $cart = Cart::content();
        
        Session::put('shipping', $input);

        if(Cart::count() > 0) {
            return redirect('payment-method/'.$invoice_number);
        } else {
            return redirect('home');
        }
    }
}
