<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rajaongkir;
use Session;

class TrackOrderController extends Controller
{
    function index() {
        return view('frontend.track-order');
    }

    function getStates(Request $request) {
        $provinces = RajaOngkir::Provinsi()->getList();
        return response()->json($provinces);
    }

    function getCities(Request $request) {
        $cities = RajaOngkir::Kota()->byProvinsi($request->id)->get();
        $list = [];
		foreach($cities as $k => $v) {
                $list[$v['city_id']] = $v['city_name'];
        }
        return response()->json($list);
    }

    function getSubdistricts(Request $request) {
        $cities = RajaOngkir::Kecamatan()->byCity($request->id)->get();
        $list = [];
		foreach($cities as $k => $v) {
                $list[$v['subdistrict_id']] = $v['subdistrict_name'];
        }
        return response()->json($list);
    }

    function getCost(Request $request) {
        if(!isset($request->courier)) {
            $kota = $request->id;
            $courier = 'jne';
        } else {
            $getkota = RajaOngkir::Kota()->search('city_name', $name = $request->id)->get();
            $kota = $getkota[0]['city_id'];
            $courier = $request->courier;
        }
        $cost = RajaOngkir::Cost([
            'origin' 		=> 153, // id kota asal
            'originType'    => 'city',
            'destination' 	=> $kota, // id kota tujuan
            'destinationType'=> 'city',
            'weight' 		=> 2300, // berat satuan gram
            'courier' 		=> $courier, // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
        return response()->json($cost);
    }

    function updateCost(Request $request) {
        $input = $request->all();
        Session::put('shipping', $input);
        //Session::put(['shipping.shipping_cost'=>$request->shipping_cost,'shipping.shipping_type'=>$request->shipping_type,'shipping.shipping_duration'=>$request->shipping_duration]);
    }

    function getWaybill(Request $request) {
        $waybill = RajaOngkir::Waybill([
            'waybill' 		=> $request->waybill, // id kota asal
            'courier' 		=> $request->courier, // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
        return response()->json($waybill);
    }
}
