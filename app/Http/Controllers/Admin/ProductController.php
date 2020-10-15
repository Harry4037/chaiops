<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Category;
use App\Models\Cart;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.product.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function productList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = Product::query()->with('productCategory')->whereHas("productCategory", function($query) {
                $query->whereNull("deleted_at");
            })->latest()->whereHas("productCategory", function($query) {
                $query->where("is_active", 1);
            });
            if ($searchKeyword) {
                $query->where('name', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $products = $query->take($limit)->offset($offset)->get();

            $productsArray = [];
            foreach ($products as $k => $product) {
                $productsArray[$k]['name'] = $product->name;
                $productsArray[$k]['category'] = $product->productCategory->description;
                $productsArray[$k]['price'] = $product->price;
                $checked_status = $product->is_active ? "checked" : '';
                $productsArray[$k]['status'] ="<label class='c-switch c-switch-label c-switch-pill c-switch-success'><input class='c-switch-input update_status' type='checkbox' id=" . $product->id . " data-status=" . $product->is_active . " " . $checked_status . ">
                <span class='c-switch-slider' data-checked='✓' data-unchecked='✕'></span>
              </label>";
                $productsArray[$k]['action'] = '<a href="' . route('admin.product.edit', $product) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                        . '<a href="javaScript:void(0);" class="btn btn-danger btn-xs delete" id="' . $product->id . '" ><i class="fa fa-trash"></i> Delete </a>';
            }
            $data['data'] = $productsArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function productDelete(Request $request) {
        try {
            $product = Product::find($request->id);
            if ($product) {
                $tems = Cart::Where('product_id',$product->id)->get();
                foreach($tems as $ite){
                    Cart::where('id',$ite->id)->delete();
                }
                $product->delete();
                return ['status' => true, "message" => "product deleted."];
            } else {
                return ['status' => false, "message" => "Something went be wrong."];
            }
        } catch (\Exception $ex) {
            return ['status' => false, "message" => $ex->getMessage()];
        }
    }

    public function productEdit(Request $request, Product $product) {
        try {
            if ($request->isMethod("post")) {
                $validator = Validator::make($request->all(), [
                            'product_name' => [
                                'bail',
                                'required',
                                Rule::unique('products', 'name')->ignore($product->id)->where(function ($query) use($request) {
                                            return $query->where(['name' => $request->product_name])
                                                            ->whereNull('deleted_at');
                                        }),
                            ],
                            'category_id' => ['required'],
//                            'product_description' => ['required'],
                            // 'product_price' => ['bail', 'required', 'numeric', 'min:0'],
                         
                            // 'product_type' => ['required'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.product.edit', $product->id)->withErrors($validator)->withInput();
                }

                $product->name = $request->product_name;
                $product->description = $request->product_description;
                $product->category_id = $request->category_id;
                // $product->price = $request->product_price;
                if ($request->hasFile('product_img')) {
                    $icon = $request->file("product_img");
                    $iconImage = Storage::disk('public')->put('product', $icon);
                    $icon_file_name = basename($iconImage);
                    $product->img = $icon_file_name;
                }
                // $product->type = $request->product_type;
                $product->created_by = auth()->user()->id;
                $product->updated_by = auth()->user()->id;
                if ($product->save()) {
                    ProductType::where('product_id',$product->id)->delete();
                    foreach($request->other_products as $i=> $product_type){                    
                        $productType = new ProductType();
                        $productType->product_id = $product->id;
                        $productType->type = $product_type;
                        $productType->price = $request->other_prices[$i];
                        $productType->save();
                    }
                    return redirect()->route('admin.product.index')->with('status', 'product has been updated successfully.');
                } else {
                    return redirect()->route('admin.product.index')->with('error', 'Something went be wrong.');
                }
            }

         
            $categories = Category::all();
            $types = ProductType::where('product_id',$product->id)->get();
            return view('admin.product.edit', [
                'product' => $product,
                'categories' => $categories,      
                'types' => $types,
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.product.index')->with('error', $ex->getMessage());
        }
    }

    public function productAdd(Request $request) {
        try {
            if ($request->isMethod("post")) {

                $validator = Validator::make($request->all(), [
                            'product_name' => [
                                'bail',
                                'required',
                                Rule::unique('products', 'name')->where(function ($query) use($request) {
                                            return $query->where(['name' => $request->product_name])
                                                            ->whereNull('deleted_at');
                                        }),
                            ],
                            'category_id' => ['required'],
//                            'product_description' => ['required'],
                            // 'product_price' => ['bail', 'required', 'numeric', 'min:0'],
                    
                            // 'product_type' => ['required'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.product.add')->withErrors($validator)->withInput();
                }

                $product = new Product();
                
                $product->name = $request->product_name;
                $product->description = $request->product_description;
                $product->category_id = $request->category_id;
                // $product->price = $request->product_price;
                if ($request->hasFile('product_img')) {
                    $icon = $request->file("product_img");
                    $iconImage = Storage::disk('public')->put('product', $icon);
                    $icon_file_name = basename($iconImage);
                    $product->img = $icon_file_name;
                }else{
                    $product->img = NULL;
                }

                $product->is_active = 1;
                // $product->type = $request->product_type;
                $product->created_by = auth()->user()->id;
                $product->updated_by = auth()->user()->id;
                if ($product->save()) {
                    foreach($request->other_products as $i=> $product_type){
                      
                        $productType = new ProductType();
                        $productType->product_id = $product->id;
                        $productType->type = $product_type;
                        $productType->price = $request->other_prices[$i];
                        $productType->save();
                    }

                    return redirect()->route('admin.product.index')->with('status', 'product has been added successfully.');
                } else {
                    return redirect()->route('admin.product.index')->with('error', 'Something went be wrong.');
                }
            }

            $categories = Category::where("is_active", 1)->get();
            return view('admin.product.add', [
                'categories' => $categories,
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.product.index')->with('error', $ex->getMessage());
        }
    }

    public function productStatus(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $product = Product::findOrFail($request->record_id);
                $product->is_active = $request->status;
                $product->updated_at = Carbon::now();
                if ($product->save()) {
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

}