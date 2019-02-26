<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    //
    protected $table = 'faq';

    protected function getFAQCategories() {
        $faq_categories = \DB::table('faq_categories')->get();

        return $faq_categories;
    }

    protected function getFAQCategory($slug) {
        $faq_category = \DB::table('faq_categories')->where('slug', $slug)->first();

        return $faq_category;
    }

    protected function getFirstFAQ() {
        $faqs = self::orderBy('faq_id', 'ASC')->get();

        return $faqs;
    }
    protected function getFirstFAQCategory() {
        $faqs = \DB::table('faq_categories')->orderBy('faq_category_id', 'ASC')->first();
        return $faqs;
    }

    protected function getFAQ($slug) {
        $faq_category = \DB::table('faq_categories')->where('slug', $slug)->first();
        $faqs = self::where('faq_category_id', $faq_category->faq_category_id)->get();

        return $faqs;
    }
}
