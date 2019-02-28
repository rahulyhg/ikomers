<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    protected function getOrderProducts($orders_id) {
        $products = \DB::table('orders_products')->where('orders_id', $orders_id)->get();
        return $products;
    }
}
