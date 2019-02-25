<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Cart;
use App\User;
use Carbon\Carbon;
use App\Jobs\SendOrderEmail;
use App\Jobs\SendVerificationEmail;
use Illuminate\Support\Str;

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
        $order_id = "EOS" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $input = $request->all();

        $chart = Cart::content();

        $order = Order::insert([
            //customer
            'customers_name' => $input['customers_firstname']." ".$input['customers_lastname'],
            'customers_street_address' => $input['delivery_street_address'],
            'customers_suburb' => $input['delivery_suburb'],
            'customers_city' => $input['delivery_city'],
            'customers_state' => $input['delivery_state'],
            'customers_postcode' => $input['delivery_postcode'],
            'customers_telephone' => $input['delivery_phone'],

            //billing
            'billing_name' => $input['customers_firstname']." ".$input['customers_lastname'],
            'billing_street_address' => $input['delivery_street_address'],
            'billing_suburb' => $input['delivery_suburb'],
            'billing_city' => $input['delivery_city'],
            'billing_state' => $input['delivery_state'],
            'billing_postcode' => $input['delivery_postcode'],
            'billing_phone' => $input['delivery_phone'],
            
            //delivery
            'delivery_name' => $input['customers_firstname']." ".$input['customers_lastname'],
            'delivery_street_address' => $input['delivery_street_address'],
            'delivery_suburb' => $input['delivery_suburb'],
            'delivery_city' => $input['delivery_city'],
            'delivery_state' => $input['delivery_state'],
            'delivery_postcode' => $input['delivery_postcode'],
            'delivery_phone' => $input['delivery_phone'],

            'order_price' => Cart::total(2, '.', ''),
            'date_purchased' => Carbon::now(),
            'email' => $input['email'],
            'transaction_id' => $order_id
        ]);

        $order = Order::orderBy('orders_id', 'DESC')->first();

        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order->orders_id,
            'orders_status_id' => '1',
            'date_added' => Carbon::now()->toDateString()
        ]);

        
        foreach($chart as $item) {
            $order_product = \DB::table('orders_products')->insert([
                'orders_id' => $order->orders_id,
                'products_id' => $item->id,
                'products_name' => $item->name,
                'products_price' => $item->price,
                'products_quantity' => $item->qty,
                'final_price' => $item->total
            ]);

            $order_product = \DB::table('orders_products')->orderBy('orders_products_id', 'DESC')->first();

            $order_product_attr = \DB::table('orders_products_attributes')->insert([
                'orders_id' => $order->orders_id,
                'orders_products_id' => $order_product->orders_products_id,
                'products_id' => $item->id,
                'products_options' => '',
                'products_options_values' => '',
                'options_values_price' => '',
                'price_prefix' => ''
            ]);
        }

        $order_user = \DB::table('orders')->where('orders_id', $order->orders_id)->first();
        $order_product = \DB::table('orders_products')->where('orders_id', $order->orders_id)->first();
        dispatch(new SendOrderEmail($order_user, $order_product));

        Cart::destroy();

        return redirect('payment-order');
    }
}
