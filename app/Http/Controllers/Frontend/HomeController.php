<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SliderImage;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductDescription;
use App\Models\ProductImage;
use App\Models\ProductFeature;

class HomeController extends Controller
{
    function index(){
        $slider_active = SliderImage::where('sliders_group', 'homepage')->offset(0)->limit(1)->get();
        $sliders = SliderImage::where('sliders_group', 'homepage')->offset(1)->limit(3)->get();
        $product_features = Product::orderBy('products_id', 'DESC')->take(3)->get();
        $features = SliderImage::where('sliders_group', 'feature-logo')->take(3)->get();
        $products = Product::getProducts()->orderBy('products.products_id', 'DESC')->take(3)->get();
        //dd($products);
        $banners = SliderImage::where('sliders_group', 'feature')->get();
        $banner_apps = SliderImage::where('sliders_group', 'logo')->take(12)->get();
        //dd($banners);
        return view('frontend.home', compact('sliders', 'slider_active', 'features', 'products', 'banners', 'banner_apps'));
    }
}
