<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SliderImage;

class GalleryController extends Controller
{
    //
    function index() {
        $galleries = SliderImage::where('sliders_group','gallery')->take(10)->get();
        return view('frontend.gallery', compact('galleries'));
    }
}
