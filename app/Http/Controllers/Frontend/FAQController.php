<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    //
    public function index() {
        return view('frontend.faq');
    }

    public function howToBuy() {
        return view('frontend.how-to-buy');
    }
}
