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

    protected function getHistoryOrder($orders_id) {
        $history = \DB::table('orders_status_history')
        ->join('orders_status', 'orders_status.orders_status_id', 'orders_status_history.orders_status_id')
        ->where('orders_id', $orders_id)->orderBy('orders_status_history.orders_status_history_id', 'DESC')->first();
        return $history;
    }
}
