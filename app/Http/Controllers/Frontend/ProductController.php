<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::getProducts()->orderBy('products.products_id', 'DESC')->paginate(30);
        $manufacturers = Manufacturer::getManufacturers()->get();
        $product_options = Product::getOptionValue('colors')->get();
        $selected_filter = [];
        $search = "";
        
        return view('frontend.product', compact('products', 'manufacturers', 'product_options', 'selected_filter', 'search'));
    }

    public function detail($slug) {
        $product = Product::getProduct($slug);
        $product_images = Product::getProductImages($slug);
        $currency = Setting::getAttr('currency_symbol');
        $products = Product::getProducts()->inRandomOrder()->take(4)->get();
        //dd($product_images);
        return view('frontend.product_detail', compact('product', 'product_images', 'products', 'currency'));
    }

    public function filterProduct() {
        $input['product'] = Input::get('product');
        $input['merk'] = Input::get('merk');
        $input['color'] = Input::get('color');

        $search = $input['product'];
        //to array filter
        $merk = explode(',', $input['merk']);
        $color = explode(',', $input['color']);
        $selected_filter = array_merge($merk, $color);

        $products = Product::getProductsFilter($input['product'], $input['merk'], $input['color'])->orderBy('products.products_id', 'DESC')->paginate(30);

        $manufacturers = Manufacturer::getManufacturers()->get();
        $product_options = Product::getOptionValue('Colors')->get();
        return view('frontend.product', compact('products', 'manufacturers', 'product_options', 'selected_filter', 'search'));
    }
}
