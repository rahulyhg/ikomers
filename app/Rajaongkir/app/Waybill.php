<?php

/*
------------------------------------
Bikinan Asep Sholihin 2019-03-01 
asep.sholihin11@gmail.com
------------------------------------
*/

namespace App\Rajaongkir\app;

class Waybill extends Api {
	public function __construct($attributes){
		parent::__construct();
		
		$this->overWriteOptions = [
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => http_build_query($attributes),
			CURLOPT_HTTPHEADER => [
				"content-type: application/x-www-form-urlencoded",
	    		"key: ".$this->apiKey
			]
		];

		$this->GetData();
	}

	protected $method = "waybill";	
}