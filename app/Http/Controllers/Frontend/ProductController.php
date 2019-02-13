<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    //
    function index(){
        $products = Product::getProducts()->orderBy('products.products_id', 'DESC')->paginate(30);
        $manufacturers = Manufacturer::getManufacturers()->get();
        $product_options = Product::getOptionValue('colors')->get();
        
        return view('frontend.product', compact('products', 'manufacturers', 'product_options'));
    }

    function detail($slug) {
        $product = Product::getProduct($slug);
        $product_images = Product::getProductImages($slug);
        $currency = Setting::getAttr('currency_symbol');
        $products = Product::getProducts()->orderBy('products.products_id', 'RAND()')->take(4)->get();
        //dd($product_images);
        return view('frontend.product_detail', compact('product', 'product_images', 'products', 'currency'));
    }
}
