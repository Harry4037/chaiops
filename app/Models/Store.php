<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function getImageAttribute($value) {
        return $value ? asset('storage/store/' . $value) : "";
    }
}
