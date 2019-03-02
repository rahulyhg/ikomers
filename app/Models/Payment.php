<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payment_confirmation';

    protected function getPaymentMethods() {
        $methods = \DB::table('payment_method')->where('active', '1')->get();
        return $methods;
    }

    protected function getBanks() {
        $banks = \DB::table('payment_bank')->get();
        return $banks;
    }
}
