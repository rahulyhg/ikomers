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

    protected function getProduct($slug) {
        $language_id = '1';
        $product = \DB::table('products')
			->leftJoin('products_description','products_description.products_id','=','products.products_id')
			->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
			->leftJoin('manufacturers_info','manufacturers.manufacturers_id','=','manufacturers_info.manufacturers_id')
			->LeftJoin('specials', function ($join) {
				$join->on('specials.products_id', '=', 'products.products_id')->where('status', '=', '1');
             })

            ->join('products_to_categories', 'products.products_id', '=', 'products_to_categories.products_id')
            ->join('categories', 'categories.categories_id', '=', 'products_to_categories.categories_id')
            ->join('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
            ->select('products.*','products_description.*', 'categories_description.*','manufacturers.*','manufacturers_info.manufacturers_url', 'specials.specials_id', 'specials.products_id as special_products_id', 'specials.specials_new_products_price as specials_products_price', 'specials.specials_date_added as specials_date_added', 'specials.specials_last_modified as specials_last_modified', 'specials.expires_date')
            
			->where('products_description.language_id','=', $language_id)
            ->where('products.products_slug','=', $slug)
            ->groupBy('products_to_categories.products_id');
			
		return $product->distinct()->first();
    }

    protected function getProductsFilter($search, $merk, $color) {
        $language_id = '1';
        $data = \DB::table('products')
			->leftJoin('products_description','products_description.products_id','=','products.products_id')
			->LeftJoin('manufacturers', function ($join) {
				$join->on('manufacturers.manufacturers_id', '=', 'products.manufacturers_id');
			 })
			->LeftJoin('specials', function ($join) {
				$join->on('specials.products_id', '=', 'products.products_id')->where('status', '=', '1');
             })
            ->leftJoin('products_attributes', 'products.products_id', '=', 'products_attributes.products_id')
            ->leftJoin('products_options_values', 'products_attributes.options_values_id', '=', 'products_options_values.products_options_values_id');
            
            $data->where('products_name', 'like', '%'.$search.'%');

            if($merk != null) {
                $arr_merk = explode(',', $merk);
                $data->where(function ($data) use ($arr_merk){
                    foreach($arr_merk as $whereMerk) {
                        $data->orWhere('manufacturers.manufacturers_name', $whereMerk);    
                    }
               });
                
            }
            if($color != null) {
                $arr_color = explode(',', $color);
                
                $data->where(function ($data) use ($arr_color){
                    foreach($arr_color as $whereColor) {
                        $data->orWhere('products_options_values.products_options_values_name', $whereColor);    
                    }
               });
                
            }
            $data->select('products.*','products_description.*', 'specials.specials_id', 'manufacturers.*', 'specials.products_id as special_products_id', 'specials.specials_new_products_price as specials_products_price', 'specials.specials_date_added as specials_date_added', 'specials.specials_last_modified as specials_last_modified', 'specials.expires_date')
            ->distinct()->where('products_description.language_id','=', $language_id);
        //dd($data);
        return $data;
    }

    protected function getProductImages($slug) {
        $language_id = '1';
        $product = \DB::table('products')->where('products.products_slug','=', $slug)->first();
        $product_images = \DB::table('products_images')			
			->where('products_id','=', $product->products_id)
			->orderBy('sort_order', 'ASC')
			->get();
			
		return $product_images;
    }

    protected function getProductAttributes($slug) {
        $product = \DB::table('products')->where('products.products_slug','=', $slug)->first();

        $product_attr = \DB::table('products_attributes')
        ->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
        ->select('products_options.*')
        ->where('products_attributes.products_id', $product->products_id)
        ->groupBy('products_attributes.options_id')
        ->get();

        $product_attributes = [];
        foreach($product_attr as $item) {
            $product_attr_val = \DB::table('products_options')
            ->join('products_options_values', 'products_options_values.products_options_id', '=', 'products_options.products_options_id')
            ->select('products_options_values.*')
            ->where('products_options.products_options_id', $item->products_options_id)
            ->get()->toArray();

            $product_attributes[] = [
                'products_options_id' => $item->products_options_id,
                'products_options_name' => $item->products_options_name,
                'products_options_values' => $product_attr_val
            ];
        }

        return $product_attributes;
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
