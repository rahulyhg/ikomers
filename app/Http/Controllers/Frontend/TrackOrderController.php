<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Steevenz\Rajaongkir;

class TrackOrderController extends Controller
{
        protected $rajaongkir;
        /*
        * --------------------------------------------------------------
        * Inisiasi Class RajaOngkir
        *
        * Tipe account yang tersedia di RajaOngkir:
        * - starter (tidak support international dan metode waybill)
        * - basic
        * - pro
        *
        * @param string|array API Key atau konfigurasi dalam array
        * @param string Account Type (lowercase)
        * --------------------------------------------------------------
        */

        public function __construct()
        {
            //
            
            $this->rajaongkir = new Rajaongkir('3e169946cdf2a71468f0ee0ec24a7140', Rajaongkir::ACCOUNT_STARTER);
            
            // inisiasi dengan config array
            $config['api_key'] = '3e169946cdf2a71468f0ee0ec24a7140';
            $config['account_type'] = 'pro';
            
            $this->rajaongkir = new Rajaongkir($config);
        }
    
    //
    function index() {
        return view('frontend.track-order');
    }

    function getWaybill(Request $request) {
        $waybill = $this->rajaongkir->getWaybill($request->waybill, $request->courier);
        
        return response()->json($waybill);
    }
}
