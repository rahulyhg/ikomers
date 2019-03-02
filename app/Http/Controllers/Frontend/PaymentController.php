<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use App\Veritrans\Veritrans;
use App\Veritrans\Midtrans;
use Cart;
use Session;
use Carbon\Carbon;
use App\Jobs\SendOrderEmail;

class PaymentController extends Controller
{
    public function __construct()
    {   
        Veritrans::$serverKey = 'SB-Mid-server-quQ53FbpETTRGleKquHEjHB2';
        Veritrans::$isProduction = false;

        Midtrans::$serverKey = 'SB-Mid-server-quQ53FbpETTRGleKquHEjHB2';
        Midtrans::$isProduction = false;
    }
    
    public function paymentMethod($invoice_number) {
        if(Cart::count() == 0) {
            return redirect('home');
        }
        $config['serverKey'] = Midtrans::$serverKey;
        $config['isProduction'] = Midtrans::$isProduction;
        $config['clientKey'] = 'SB-Mid-client-3X_KkHt5DoXFnDtf';
        $invoice_number = $invoice_number;
        return view('frontend.payment-method', compact('invoice_number','config'));
    }

    public function postPayment(Request $request) {
        $order = Order::where('invoice_number', $request->invoice_number)->first();

        $vt = new Veritrans;
        $transaction_details = array(
            'order_id'      => $order->invoice_number,
            'gross_amount'  => (int)$order->order_price
        );
        
        // Populate items
        $item_products = Order::getOrderProducts($order->orders_id);
        $products = [];
        foreach ($item_products as $item) {
            $products[] = array(
                'id'        => $item->products_id,
                'price'     => (int)$item->products_price,
                'quantity'  => $item->products_quantity,
                'name'      => $item->products_name
            );
        }
        $items = $products;
        // Populate customer's billing address
        $billing_address = array(
            'first_name'    => $order->billing_name,
            "last_name"     => '',
            'address'       => $order->billing_street_address,
            'city'          => $order->billing_city,
            'postal_code'   => $order->billing_postcode,
            'phone'         => $order->billing_phone,
            'country_code'  => 'IDN'
            );

        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => $order->delivery_name,
            "last_name"     => '',
            'address'       => $order->delivery_street_address,
            'city'          => $order->delivery_city,
            'postal_code'   => $order->delivery_postcode,
            'phone'         => $order->delivery_phone,
            'country_code'  => 'IDN'
            );

        // Populate customer's Info
        $customer_details = array(
            'first_name'    => $order->customers_name,
            "last_name"     => '',
            'email'         => $order->email,
            'phone'         => $order->customers_telephone,
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );

        if($request->payment_type == 'bank_transfer') {
            $transaction_data = array(
                'payment_type'  => $request->payment_type, 
                'bank_transfer' => array(
                   'bank'       => 'permata'
                ),
                'transaction_details'   => $transaction_details,
                'item_details'          => $items,
                'customer_details'   => $customer_details
            );
        } else if($request->payment_type == 'akulaku') {
            $transaction_data = array(
                'payment_type'  => $request->payment_type,
                'transaction_details'   => $transaction_details,
                'item_details'          => $items,
                'customer_details'   => $customer_details
            );
        }
        //dd($transaction_data);
        $response = null;
        try
        {
            if($request->payment_type == 'bank_transfer') {
                $response= $vt->vtdirect_charge($transaction_data);
            } else if($request->payment_type == 'akulaku') {
                $vtweb_url = $vt->vtweb_charge($transaction_data);
                return redirect($vtweb_url);
            }
        } 
        catch (Exception $e) 
        {
            return $e->getMessage; 
        }
        //dd($response);
        $order_user = \DB::table('orders')->where('orders_id', $order->orders_id)->first();
        $order_product = \DB::table('orders_products')->where('orders_id', $order->orders_id)->first();
        dispatch(new SendOrderEmail($order_user, $order_product));

        Cart::destroy();

        if($response)
        {
            if($response->transaction_status == "capture")
            {
                return redirect()->route('payment', ['invoice_number' => $request->invoice_number])->with('message', 'Silahkan lakukan pembayaran.');
            }
            else if($response->transaction_status == "deny")
            {
                return redirect()->route('payment', ['invoice_number' => $request->invoice_number])->with('message', 'Silahkan lakukan pembayaran.');
            }
            else if($response->transaction_status == "challenge")
            {
                return redirect()->route('payment', ['invoice_number' => $request->invoice_number])->with('message', 'Silahkan lakukan pembayaran.');
            }
            else
            {
                return redirect()->route('payment', ['invoice_number' => $request->invoice_number])->with('message', 'Silahkan lakukan pembayaran.');
            }   
        }
    }

    public function payment($status) {
        if($status == "success"){
            $message = "Terima kasih telah menyelesaikan transaksi di Endless Store.";
        } elseif($status == "pending") {
            $message = "Terimakasih, kami menunggu pembayaran.";
        } else {
            $message = "Mohon maaf, terjadi kesalahan. Silahkan ulangi.";
        }
        $banks = Payment::getBanks();

        $cart = Cart::content();
        $order_session = Session::get('shipping');

        if(Cart::count() > 0) {

            $order = Order::insert([
                //customer
                'customers_id' => $order_session['customers_id'],
                'customers_name' => $order_session['customers_firstname']." ".$order_session['customers_lastname'],
                'customers_street_address' => $order_session['delivery_street_address'],
                'customers_suburb' => $order_session['delivery_suburb'],
                'customers_city' => $order_session['delivery_city'],
                'customers_state' => $order_session['delivery_state'],
                'customers_postcode' => $order_session['delivery_postcode'],
                'customers_telephone' => $order_session['delivery_phone'],
                //billing
                'billing_name' => $order_session['customers_firstname']." ".$order_session['customers_lastname'],
                'billing_street_address' => $order_session['delivery_street_address'],
                'billing_suburb' => $order_session['delivery_suburb'],
                'billing_city' => $order_session['delivery_city'],
                'billing_state' => $order_session['delivery_state'],
                'billing_postcode' => $order_session['delivery_postcode'],
                'billing_phone' => $order_session['delivery_phone'],
                
                //delivery
                'delivery_name' => $order_session['customers_firstname']." ".$order_session['customers_lastname'],
                'delivery_street_address' => $order_session['delivery_street_address'],
                'delivery_suburb' => $order_session['delivery_suburb'],
                'delivery_city' => $order_session['delivery_city'],
                'delivery_state' => $order_session['delivery_state'],
                'delivery_postcode' => $order_session['delivery_postcode'],
                'delivery_phone' => $order_session['delivery_phone'],
                'order_price' => Cart::total(2, '.', ''),
                'date_purchased' => Carbon::now(),
                'email' => $order_session['email'],
                'invoice_number' => $order_session['invoice_number']
            ]);
            $order = Order::orderBy('orders_id', 'DESC')->first();
            $order_history = \DB::table('orders_status_history')->insert([
                'orders_id' => $order->orders_id,
                'orders_status_id' => '1',
                'date_added' => Carbon::now()->toDateString()
            ]);
            
            foreach($cart as $item) {
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
            Session::forget('shipping');
        } else {
            return redirect('home');
        }

        return view('frontend.payment', compact('banks','message'));
    }

    public function paymentConfirmation() {
        return view('frontend.payment-confirmation');
    }

    public function postPaymentConfirmation(Request $request) {
        // dd($request->all());
        $input = $request->all();
        unset($input['_token']);
        $payment = Payment::insert($input);

        return redirect()->back()->with('message', 'Terima kasih telah menyelesaikan transaksi di Endless Store.');
    }

    public function getSnapToken() {
        $cart = Cart::content();
        $order = Session::get('shipping');
        $midtrans = new Midtrans;
        //return response()->json($cart);

        //$midtrans = new Midtrans;
        $transaction_details = array(
            'order_id'      => $order['invoice_number'],
            'gross_amount'  => (int)Cart::total(0,'','')
        );
        
        // Populate items
        $products = [];
        foreach ($cart as $item) {
            $products[] = array(
                'id'        => $item->id,
                'price'     => (int)$item->price,
                'quantity'  => (int)$item->qty,
                'name'      => $item->name
            );
        }

        $items = $products;

        // Populate customer's billing address
        $billing_address = array(
            'first_name'    => $order['customers_firstname'],
            'last_name'     => $order['customers_lastname'],
            'address'       => $order['delivery_street_address'],
            'city'          => $order['delivery_city'],
            'postal_code'   => $order['delivery_postcode'],
            'phone'         => $order['delivery_phone'],
            'country_code'  => 'IDN'
        );

        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => $order['customers_firstname'],
            'last_name'     => $order['customers_lastname'],
            'address'       => $order['delivery_street_address'],
            'city'          => $order['delivery_city'],
            'postal_code'   => $order['delivery_postcode'],
            'phone'         => $order['delivery_phone'],
            'country_code'  => 'IDN'
        );

        // Populate customer's Info
        $customer_details = array(
            'first_name'    => $order['customers_firstname'],
            'last_name'     => $order['customers_lastname'],
            'email'         => $order['email'],
            'phone'         => $order['delivery_phone'],
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
        );

        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details
        );
        
        try
        {
            //return response()->json($transaction_data);
            $snap_token = $midtrans->getSnapToken($transaction_data);
            return response()->json($snap_token);
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
    }
}
