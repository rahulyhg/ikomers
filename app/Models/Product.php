<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected function getProducts() {
        $language_id = '1';
        $data = \DB::table('products')
			->leftJoin('products_description','products_description.products_id','=','products.products_id')
			->LeftJoin('manufacturers', function ($join) {
				$join->on('manufacturers.manufacturers_id', '=', 'products.manufacturers_id');
			 })
			->LeftJoin('specials', function ($join) {
				$join->on('specials.products_id', '=', 'products.products_id')->where('status', '=', '1');
             });
        $data->select('products.*','products_description.*', 'specials.specials_id', 'manufacturers.*', 'specials.products_id as special_products_id', 'specials.specials_new_products_price as specials_products_price', 'specials.specials_date_added as specials_date_added', 'specials.specials_last_modified as specials_last_modified', 'specials.expires_date')
        ->where('products_description.language_id','=', $language_id);

        return $data;
    }

    protected function getOptions() {
        $language_id = '1';
        $options = \DB::table('products_options')
					->join('products_options_descriptions', 'products_options_descriptions.products_options_id', '=', 'products_options.products_options_id')
                    ->select('products_options.products_options_id', 'products_options_descriptions.options_name as products_options_name', 'products_options_descriptions.language_id')->where('products_options_descriptions.language_id', $language_id);
        
        return $options;
    }

    protected function getOptionValue($option) {
        $language_id = '1';
        $option = \DB::table('products_options_values')
            ->join('products_options', 'products_options.products_options_id','=','products_options_values.products_options_id')
            ->join('products_options_values_descriptions','products_options_values_descriptions.products_options_values_id','=','products_options_values.products_options_values_id')
			->select('products_options_values_descriptions.*')
			->where('products_options_values_descriptions.language_id','=', $language_id)
            ->where('products_options.products_options_name','=', $option);
        return $option;
    }
}
