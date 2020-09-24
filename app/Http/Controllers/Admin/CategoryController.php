<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.category.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function categoryList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = Category::query();
            if ($searchKeyword) {
                $query->where('description', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $categories = $query->take($limit)->offset($offset)->latest()->get();

            $categoriesArray = [];
            foreach ($categories as $k => $category) {
                $categoriesArray[$k]['image_name'] = '<img class="img-bordered" height="60" width="100" src=' . $category->image_name . '>';
                $checked_status = $category->is_active ? "checked" : '';
                $categoriesArray[$k]['status'] = "<label class='c-switch c-switch-label c-switch-pill c-switch-success'><input class='c-switch-input update_status' type='checkbox' id=" . $category->id . " data-status=" . $category->is_active . " " . $checked_status . ">
                <span class='c-switch-slider' data-checked='✓' data-unchecked='✕'></span>
              </label>";
                $categoriesArray[$k]['name'] = $category->description;
                $categoriesArray[$k]['action'] = '<a href="' . route('admin.category.edit', $category) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                        . '<a href="" class="btn btn-danger btn-xs delete" data-dismiss="alert" id="' . $category->id . '" ><i class="fa fa-trash"></i> Delete </a>';
            }
            $data['data'] = $categoriesArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function categoryDelete(Request $request) {
      
        try {
            $category = Category::find($request->id);
            if ($category) {
                $category->delete();
                return ['status' => true, "message" => "Category deleted."];
            } else {
                return ['status' => false, "message" => "Something went be wrong."];
            }
        } catch (\Exception $ex) {
            return ['status' => false, "message" => $ex->getMessage()];
        }
    }

    public function categoryEdit(Request $request, Category $category) {
        try {

            if ($request->isMethod("post")) {
                $validator = Validator::make($request->all(), [
                            'category_name' => [
                                'bail',
                                'required',
                                Rule::unique('categories', 'description')->ignore($category->id)->where(function ($query) use($request) {
                                            return $query->where(['description' => $request->category_name])
                                                            ->whereNull('deleted_at');
                                        }),
                            ],
                            'icon' => ['mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.category.edit', $category->id)->withErrors($validator)->withInput();
                }

                if ($request->hasFile('icon')) {
                    $categoryImg = Category::selectRaw('image_name img')->find($category->id);
                    Storage::disk('public')->delete('category/' . $categoryImg->img);
                    $icon = $request->file("icon");
                    $iconImage = Storage::disk('public')->put('category', $icon);
                    $icon_file_name = basename($iconImage);
                    $category->image_name = $icon_file_name;
                }
                $category->description = $request->category_name;

                if ($category->save()) {
                    return redirect()->route('admin.category.index')->with('status', 'Category has been updated successfully.');
                } else {
                    return redirect()->route('admin.category.index')->with('error', 'Something went be wrong.');
                }
            }

            return view('admin.category.edit', [
                'category' => $category
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.category.index')->with('error', $ex->getMessage());
        }
    }

    public function categoryAdd(Request $request) {
        try {

            if ($request->isMethod("post")) {
                $validator = Validator::make($request->all(), [
                            'category_name' => [
                                'bail',
                                'required',
                                Rule::unique('categories', 'description')->where(function ($query) use($request) {
                                            return $query->where(['description' => $request->category_name])
                                                            ->whereNull('deleted_at');
                                        }),
                            ],
                            'icon' => ['required', 'mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.category.add')->withErrors($validator)->withInput();
                }
                $category = new Category();
                if ($request->hasFile('icon')) {
                    $icon = $request->file("icon");
                    $iconImage = Storage::disk('public')->put('category', $icon);
                    $icon_file_name = basename($iconImage);
                    $category->image_name = $icon_file_name;
                }

                $category->description = $request->category_name;
                $category->is_active = 1;
                $category->created_by = auth()->user()->id;
                $category->updated_by = auth()->user()->id;

                if ($category->save()) {
                    return redirect()->route('admin.category.index')->with('status', 'Category has been updated successfully.');
                } else {
                    return redirect()->route('admin.category.index')->with('error', 'Something went be wrong.');
                }
            }

            return view('admin.category.add');
        } catch (\Exception $ex) {
            return redirect()->route('admin.category.index')->with('error', $ex->getMessage());
        }
    }

    public function categoryStatus(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $category = Category::findOrFail($request->record_id);
                $category->is_active = $request->status;
                $category->updated_at = Carbon::now();
                if ($category->save()) {
                    $product = Product::where('category_id',$request->record_id)->get();
                    foreach ($product as $k => $item) {
                        // Product::where('id',$item->id)->update('is_active',$request->status);
                $updat = Product::find($item->id);
                $updat->is_active = $request->status;
                $updat->updated_at = Carbon::now();
                $updat->save();

                    }
                    return ['status' => true, 'data' => ["status" => $request->status, "message" => "Status updated successfully."]];
                } else {
                    return ['status' => false, "message" => "Something went be wrong."];
                }
            } else {
                return ['status' => false, "message" => "Method not allowed."];
            }
        } catch (\Exception $e) {
            return ['status' => false, "message" => $e->getMessage()];
        }
    }

    public function getCategoryProducts(Request $request) {
        $products = Product::where("category_id", $request->category_id)->get();
        return view('admin.category.product', [
            'products' => $products
        ]);
    }

}