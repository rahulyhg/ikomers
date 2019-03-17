<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Cart;
use Auth;
use Session;
use Rajaongkir;
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
            
            $data = array();
            $auth = Auth::user();
            if($auth) {
                $data['user'] = User::find($auth->customers_id);
                $data['address_book'] = \DB::table('address_book')->where('customers_id', $data['user']->customers_id)->first();
                $data['shipping_methods'] = \DB::table('shipping_methods')->where('status','1')->get();
                if(isset($data['address_book'])) {
                    $kota = RajaOngkir::Kota()->search('city_name', $name = $data['address_book']->entry_city)->get();
                    $cost = RajaOngkir::Cost([
                        'origin' 		=> 153, // id kota asal
                        'originType'    => 'city',
                        'destination' 	=> $kota[0]['city_id'], // id kota tujuan
                        'destinationType'=> 'city',
                        'weight' 		=> 2300, // berat satuan gram
                        'courier' 		=> 'jne', // kode kurir pengantar ( jne / tiki / pos )
                    ])->get();
                }
            }

            $provinces = RajaOngkir::Provinsi()->all();
            return view('frontend.checkout', compact('data','provinces','cost'));
        }
        return redirect('cart');
    }

    public function payment() {
        return view('frontend.payment');
    }

    public function checkout(Request $request) {

        // generate a pin based
        $pin = mt_rand(1, 999);
        // shuffle the result
        $string = str_shuffle($pin);

        $invoice_number = "EOS" .$string. str_pad(mt_rand(0, 999999), 3, '0', STR_PAD_LEFT);
        $input = $request->except('_token');
        $input['invoice_number'] = $invoice_number;
        $input['shipping_method'] = Session::get('shipping')['shipping_type'];
        $input['shipping_duration'] = Session::get('shipping')['shipping_duration'];
        $cart = Cart::content();
        
        Session::put('shipping', $input);
        
        if(Cart::count() > 0) {
            return redirect('payment-method/'.$invoice_number);
        } else {
            return redirect('home');
        }
    }
}
