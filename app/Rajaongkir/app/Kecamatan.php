<?php

/*
------------------------------------
Bikinan Asep Sholihin 2019-03-01 
asep.sholihin11@gmail.com
------------------------------------
*/

namespace App\Rajaongkir\app;

class Kecamatan extends Api {
	protected $method = "subdistrict";

	public function byCity($city_id){
		$this->parameters = "?city=".$city_id;
		return $this->GetData();
	}
}