<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getImgAttribute($value) {
        return $value ? asset('storage/blog/' . $value) : "";
    }

    public function blogComment() {
        return $this->hasMany('App\Models\BlogComment', 'blog_id');
    }
}
