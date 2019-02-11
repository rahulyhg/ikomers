<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    //
    protected $table = 'manufacturers';

    protected function getManufacturers() {
        $manufacturers = \DB::table('manufacturers')
		->leftJoin('manufacturers_info','manufacturers_info.manufacturers_id', '=', 'manufacturers.manufacturers_id')
		->select('manufacturers.manufacturers_id as id', 'manufacturers.manufacturers_image as image',  'manufacturers.manufacturers_name as name', 'manufacturers_info.manufacturers_url as url', 'manufacturers_info.url_clicked', 'manufacturers_info.date_last_click as clik_date')
        ->where('manufacturers_info.languages_id', '1');
        $manufacturers->select('*');
        
        return $manufacturers;
    }
}
