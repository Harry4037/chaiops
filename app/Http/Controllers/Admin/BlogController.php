<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class BlogController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.blog.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }
    
    public function blogList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = Blog::query();
            if ($searchKeyword) {
                $query->where('title', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $blogs = $query->take($limit)->offset($offset)->latest()->get();

            $blogsArray = [];
            foreach ($blogs as $k => $blog) {
                $blogsArray[$k]['image_name'] = '<img class="img-bordered" height="60" width="100" src=' . $blog->img . '>';
                $blogsArray[$k]['name'] = $blog->title;
                $blogsArray[$k]['description'] = $blog->description;
                $blogsArray[$k]['action'] = '<a href="' . route('admin.blog.edit', $blog) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                        . '<a href="javaScript:void(0);" class="btn btn-danger btn-xs delete" id="' . $blog->id . '" ><i class="fa fa-trash"></i> Delete </a>';
            }
            $data['data'] = $blogsArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function blogDelete(Request $request) {
        try {
            $blog = Blog::find($request->id);
            if ($blog) {
                $blog->delete();
                return ['status' => true, "message" => "blog deleted."];
            } else {
                return ['status' => false, "message" => "Something went be wrong."];
            }
        } catch (\Exception $ex) {
            return ['status' => false, "message" => $ex->getMessage()];
        }
    }

    public function blogEdit(Request $request, blog $blog) {
        try {

            if ($request->isMethod("post")) {
                $validator = Validator::make($request->all(), [
                            
                            'icon' => ['mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.blog.edit', $blog->id)->withErrors($validator)->withInput();
                }

                if ($request->hasFile('icon')) {
                    $blogImg = blog::selectRaw('image_name img')->find($blog->id);
                    Storage::disk('public')->delete('blog/' . $blogImg->img);
                    $icon = $request->file("icon");
                    $iconImage = Storage::disk('public')->put('blog', $icon);
                    $icon_file_name = basename($iconImage);
                    $blog->img = $icon_file_name;
                }
                $blog->type = $request->blog_type;
                $blog->title = $request->blog_name;
                $blog->description = $request->blog_description;

                if ($blog->save()) {
                    return redirect()->route('admin.blog.index')->with('status', 'blog has been updated successfully.');
                } else {
                    return redirect()->route('admin.blog.index')->with('error', 'Something went be wrong.');
                }
            }

            return view('admin.blog.edit', [
                'blog' => $blog
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.blog.index')->with('error', $ex->getMessage());
        }
    }

    public function blogAdd(Request $request) {
        try {

            if ($request->isMethod("post")) {
                $validator = Validator::make($request->all(), [
                            'icon' => ['mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.blog.add')->withErrors($validator)->withInput();
                }
                $blog = new Blog();
                if ($request->hasFile('icon')) {
                    $icon = $request->file("icon");
                    $iconImage = Storage::disk('public')->put('blog', $icon);
                    $icon_file_name = basename($iconImage);
                    $blog->img = $icon_file_name;
                }
                $blog->type = $request->blog_type;
                $blog->title = $request->blog_name;
                $blog->description = $request->blog_description;

                if ($blog->save()) {
                    return redirect()->route('admin.blog.index')->with('status', 'Blog has been updated successfully.');
                } else {
                    return redirect()->route('admin.blog.index')->with('error', 'Something went be wrong.');
                }
            }

            return view('admin.blog.add');
        } catch (\Exception $ex) {
            return redirect()->route('admin.blog.index')->with('error', $ex->getMessage());
        }
    }

}
