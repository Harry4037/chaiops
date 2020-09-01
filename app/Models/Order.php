<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderItem() {
        return $this->hasMany('App\Models\OrderItem', 'order_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
