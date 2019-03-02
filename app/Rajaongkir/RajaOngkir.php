<?php

/*
------------------------------------
Bikinan Asep Sholihin 2019-03-01 
asep.sholihin11@gmail.com
------------------------------------
*/

namespace App\Rajaongkir;

use App\Rajaongkir\app\Provinsi;
use App\Rajaongkir\app\Kota;
use App\Rajaongkir\app\Cost;
use App\Rajaongkir\app\Waybill;

class RajaOngkir {
	public function Provinsi(){
		return new Provinsi;
	}

	public function Kota(){
		return new Kota;
	}

	public function Cost($attributes){
		return new Cost($attributes);
	}

	public function Waybill($attributes){
		return new Waybill($attributes);
	}
}