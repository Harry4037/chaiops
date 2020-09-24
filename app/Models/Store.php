<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function getImage1Attribute($value) {
        return $value ? asset('storage/store/' . $value) : "";
    }
    public function getImage2Attribute($value) {
        return $value ? asset('storage/store/' . $value) : "";
    }
    public function getImage3Attribute($value) {
        return $value ? asset('storage/store/' . $value) : "";
    }

}
