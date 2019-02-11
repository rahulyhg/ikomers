<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    //
    function index(){
        $products = Product::getProducts()->orderBy('products.products_id', 'DESC')->paginate(30);
        $manufacturers = Manufacturer::getManufacturers()->get();
        $product_options = Product::getOptionValue('colors')->get();
        //dd($product_options);
        return view('frontend.product', compact('products', 'manufacturers', 'product_options'));
    }
}
