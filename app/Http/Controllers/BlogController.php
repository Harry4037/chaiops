<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;

class BlogController extends Controller {

    public function blog() {
        $data['blog'] = Blog::where('type','blog')->get();
        $data['video'] = Blog::where('type','video')->get();
   
        return view('home.blog', compact('data'));
    }

    
    public function blogDetails($id) {
        $data = Blog::Where('id',$id)->with(['blogComment' => function($query) {
            $query->where("is_approve", 1);
        }])->first();
        return view('home.blogdetail', compact('data'));
    }

    public function blogComment(Request $request) {
        $comment = new BlogComment();
        $comment->blog_id = $request->blog_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->save();
        return redirect()->route('site.blog');
    }
}
