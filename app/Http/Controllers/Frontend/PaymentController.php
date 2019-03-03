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
use PaymentInfo;

class PaymentController extends Controller
{
    public function __construct()
    {   
        Veritrans::$serverKey = env('MIDTRANS_SERVER_KEY', 'default');
        Veritrans::$isProduction = env('MIDTRANS_PRODUCTION', 'false');

        Midtrans::$serverKey = env('MIDTRANS_SERVER_KEY', 'default');
        Midtrans::$isProduction = env('MIDTRANS_PRODUCTION', 'false');
    }
    
    public function paymentMethod($invoice_number) {
        if(Cart::count() == 0) {
            return redirect('home');
        }
        $config['serverKey'] = Midtrans::$serverKey;
        $config['isProduction'] = Midtrans::$isProduction;
        $config['clientKey'] = env('MIDTRANS_CLIENT_KEY', 'default');
        $invoice_number = $invoice_number;
        $shipping_cost = Session::get('shipping')['shipping_cost'];
        $total = Cart::total(0,'','')+$shipping_cost;
        return view('frontend.payment-method', compact('invoice_number','config','shipping_cost','total'));
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

    public function payment($status='') {
        $cart = Cart::content();
        $order_session = Session::get('shipping');
        
        if(Cart::count() > 0 && !isset($order_session['invoice_number'])) {

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
            $vt = new Veritrans;
                
            $payment_info = PaymentInfo::getInfo($order_session['invoice_number']);
            dispatch(new SendOrderEmail($order_user, $order_product, $payment_info));
            Cart::destroy();
            Session::forget('shipping');
        }

        if(!isset($status)) {
            if($status == "capture"){
                $message = "Terima kasih telah menyelesaikan transaksi di Endless Store.";
            } elseif($status == "settlement") {
                $message = "Terima kasih telah menyelesaikan transaksi di Endless Store.";
            } elseif($status == "pending") {
                $message = "Terimakasih, kami menunggu pembayaran.";
            } elseif($status == "deny") {
                $message = "Mohon maaf, pembayaran yang dilakukan gagal.";
            } elseif($status == "cancel") {
                $message = "Mohon maaf, pembayaran dibatalkan.";
            } elseif($status == "refund") {
                $message = "Terimakasih, pembayaran akan kami refund.";
            } elseif($status == "expire") {
                $message = "Mohon maaf, pembayaran telah kadaluarsa.";
            }
    
            return view('frontend.payment', compact('message'));
        } else {
            $vt = new Veritrans;
            $json_result = file_get_contents('php://input');
            $result = json_decode($json_result);
            if($result){
                $notif = $vt->status($result->order_id);
                if($notif->transaction_status == "capture"){
                    $message = "Terima kasih telah menyelesaikan transaksi di Endless Store.";
                } elseif($notif->transaction_status == "settlement") {
                    $message = "Terima kasih telah menyelesaikan transaksi di Endless Store.";
                } elseif($notif->transaction_status == "pending") {
                    $message = "Terimakasih, kami menunggu pembayaran.";
                } elseif($notif->transaction_status == "deny") {
                    $message = "Mohon maaf, pembayaran yang dilakukan gagal.";
                } elseif($notif->transaction_status == "cancel") {
                    $message = "Mohon maaf, pembayaran dibatalkan.";
                } elseif($notif->transaction_status == "refund") {
                    $message = "Terimakasih, pembayaran akan kami refund.";
                } elseif($notif->transaction_status == "expire") {
                    $message = "Mohon maaf, pembayaran telah kadaluarsa.";
                }

                return view('frontend.payment', compact('message'));
            } else {
                return redirect('home');
            }
        }
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
        $shipping_cost = Session::get('shipping')['shipping_cost'];
        $shipping_peritem = Session::get('shipping')['shipping_cost']/Cart::count();
        $total = Cart::total(0,'','')+$shipping_cost;
        $midtrans = new Midtrans;
        //return response()->json($shipping_cost);

        //$midtrans = new Midtrans;
        $transaction_details = array(
            'order_id'      => $order['invoice_number'],
            'gross_amount'  => (int)$total
        );
        
        // Populate items
        $products = [];
        foreach ($cart as $item) {
            $products[] = array(
                'id'        => $item->id,
                'price'     => (int)$item->price+$shipping_peritem,
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

    public function notification() {
        $vt = new Veritrans;
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        if($result){
            $notif = $vt->status($result->order_id);
            
            switch ($notif->transaction_status) {
                case 'capture':
                    $this->capture($notif->order_id);
                    break;
                case 'settlement':
                    $this->settlement($notif->order_id);
                    break;
                case 'pending':
                    $this->pending($notif->order_id);
                    break;
                case 'deny':
                    $this->deny($notif->order_id);
                    break;
                case 'cancel':
                    $this->cancel($notif->order_id);
                    break;
                case 'expire':
                    $this->expire($notif->order_id);
                    break;
                case 'refund':
                    $this->refund($notif->order_id);
                    break;
            } 
        }
    }

    public function capture($order_id)
    {
        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order_id,
            'orders_status_id' => '2',
            'date_added' => Carbon::now()->toDateString()
        ]);
    }
    public function settlement($order_id)
    {
        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order_id,
            'orders_status_id' => '2',
            'date_added' => Carbon::now()->toDateString()
        ]);
    }
    public function pending($order_id)
    {
        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order_id,
            'orders_status_id' => '1',
            'date_added' => Carbon::now()->toDateString()
        ]);
    }
    public function deny($order_id)
    {
        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order_id,
            'orders_status_id' => '4',
            'date_added' => Carbon::now()->toDateString()
        ]);
    }
    public function cancel($order_id)
    {
        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order_id,
            'orders_status_id' => '3',
            'date_added' => Carbon::now()->toDateString()
        ]);
    }
    public function refund($order_id)
    {
        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order_id,
            'orders_status_id' => '5',
            'date_added' => Carbon::now()->toDateString()
        ]);
    }
    public function expire($order_id)
    {
        $order_history = \DB::table('orders_status_history')->insert([
            'orders_id' => $order_id,
            'orders_status_id' => '6',
            'date_added' => Carbon::now()->toDateString()
        ]);
    }
}
