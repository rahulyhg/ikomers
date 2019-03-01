<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'settings';

    protected function getAttr($field) {
        $setting = Setting::where('name', $field)->first();
        return $setting->value;
    }
}
