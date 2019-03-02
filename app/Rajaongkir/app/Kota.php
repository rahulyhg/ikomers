<?php

/*
------------------------------------
Bikinan Asep Sholihin 2019-03-01 
asep.sholihin11@gmail.com
------------------------------------
*/

namespace App\Rajaongkir\app;

class Kota extends Api {
	protected $method = "city";

	public function byProvinsi($province_id){
		$this->parameters = "?province=".$province_id;
		return $this->GetData();
	}
}