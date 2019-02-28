<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use App\Veritrans\Veritrans;
use App\Veritrans\Midtrans;
use Cart;
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
        $methods = Payment::getPaymentMethods();
        $banks = Payment::getBanks();
        $invoice_number = $invoice_number;
        // dd($methods);
        return view('frontend.payment-method', compact('methods', 'banks', 'invoice_number'));
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
        // $order_user = \DB::table('orders')->where('orders_id', $order->orders_id)->first();
        // $order_product = \DB::table('orders_products')->where('orders_id', $order->orders_id)->first();
        // dispatch(new SendOrderEmail($order_user, $order_product));

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

    public function payment($invoice_number) {
        $banks = Payment::getBanks();
        return view('frontend.payment', compact('banks'));
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
}
