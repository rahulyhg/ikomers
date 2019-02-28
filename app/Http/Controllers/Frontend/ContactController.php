<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendContactCustomerEmail;

class ContactController extends Controller
{
    //
    public function index() {
        return view('frontend.contact');
    }

    public function sendEmail(Request $request) {
        dispatch(new SendContactCustomerEmail($request->all()));
        return redirect()->back()->with('message','Thank you, your email has been sended. We will confirm immediately.');
    }
}
