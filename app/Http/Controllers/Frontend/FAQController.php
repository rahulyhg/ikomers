<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FAQ;

class FAQController extends Controller
{
    //
    public function faq($slug="") {
        //dd($slug);
        $faq_categories = FAQ::getFAQCategories();

        if($slug) {
            $faqs = FAQ::getFAQ($slug);
            $faq_category = FAQ::getFAQCategory($slug);
        } else {
            $faqs = FAQ::getFirstFAQ();
            $faq_category = FAQ::getFirstFAQCategory();
        }

        
        return view('frontend.faq', compact('faq_categories', 'faq_category', 'faqs'));
    }

    public function howToBuy() {
        return view('frontend.how-to-buy');
    }
}
