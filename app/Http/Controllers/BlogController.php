<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller {

    public function blog() {
        $data['blog'] = Blog::where('type','blog')->get();
        $data['video'] = Blog::where('type','video')->get();
   
        return view('home.blog', compact('data'));
    }

    
    public function blogDetails($id) {
        $data = Blog::Where('id',$id)->first();
        return view('home.blogdetail', compact('data'));
    }
}
