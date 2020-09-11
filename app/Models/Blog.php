<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getImageNameAttribute($value) {
        return $value ? asset('storage/blog/' . $value) : "";
    }
}
