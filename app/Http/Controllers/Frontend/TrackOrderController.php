<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackOrderController extends Controller
{
    //
    function index() {
        return view('frontend.track-order');
    }
}
