<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller {

    public function blog() {
        $data = Blog::paginate(5);
        return view('home.blog', compact('data'));
    }

    
    public function blogDetails($id) {
        $data = Blog::Where('id',$id)->first();
        return view('home.blogdetail', compact('data'));
    }
}
