<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    public function product() {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }
    public function productType() {
        return $this->belongsTo(ProductType::class, 'product_type_id')->withTrashed();
    }
    }

}
