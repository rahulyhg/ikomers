<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class PaymentController extends Controller
{
    //
    public function index() {
        return view('frontend.payment-order');
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
