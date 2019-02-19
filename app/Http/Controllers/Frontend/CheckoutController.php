<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Cart;

class CheckoutController extends Controller
{
    //
    public function index() {
        return view('frontend.checkout');
    }

    public function payment() {
        return view('frontend.payment');
    }

    public function checkout(Request $request) {
        $input = $request->all();

        dd(Cart::content());

        $order = Order::insert([
            'customers_name' => $input['customers_firstname']." ".$input['customers_lastname'],
            'delivery_name' => $input['customers_firstname']." ".$input['customers_lastname'],
            'delivery_street_address' => $input['delivery_street_address'],
            'delivery_suburb' => $input['delivery_suburb'],
            'delivery_city' => $input['delivery_city'],
            'delivery_state' => $input['delivery_state'],
            'delivery_postcode' => $input['delivery_postcode'],
            'delivery_phone' => $input['delivery_phone'],
            'email' => $input['email'],
        ]);

        //$order = DB::table('orders_products')->insert();
        
        return redirect('payment');
    }
}
