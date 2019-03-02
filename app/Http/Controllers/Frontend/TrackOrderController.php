<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rajaongkir;

class TrackOrderController extends Controller
{
    function index() {
        return view('frontend.track-order');
    }

    function getWaybill(Request $request) {
        $waybill = RajaOngkir::Waybill([
            'waybill' 		=> $request->waybill, // id kota asal
            'courier' 		=> $request->courier, // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
        return response()->json($waybill);
    }
}
