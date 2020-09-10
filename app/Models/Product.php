<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    use SoftDeletes;

    public function productCategory() {
        return $this->belongsTo('App\Models\Category', 'category_id')->withTrashed();
    }

}
