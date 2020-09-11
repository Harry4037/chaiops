<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function product() {
        return $this->hasMany(Product::class, 'category_id')->withTrashed();
    }
    
    public function getImageNameAttribute($value) {
        return $value ? asset('storage/category/' . $value) : "";
    }

}
