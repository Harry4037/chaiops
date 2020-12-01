<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class StoreController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.store.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function storeList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = Store::query();
            if ($searchKeyword) {
                $query->where('name', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $stores = $query->take($limit)->offset($offset)->latest()->get();

            $storesArray = [];
            foreach ($stores as $k => $store) {
                $storesArray[$k]['image_name'] = '<img class="img-bordered" height="60" width="100" src=' . $store->image1 . '>';
                $checked_status = $store->is_active ? "checked" : '';
                $storesArray[$k]['status'] = "<label class='c-switch c-switch-label c-switch-pill c-switch-success'><input class='c-switch-input update_status' type='checkbox' id=" . $store->id . " data-status=" . $store->is_active . " " . $checked_status . ">
                <span class='c-switch-slider' data-checked='✓' data-unchecked='✕'></span>
              </label>";
                $storesArray[$k]['name'] = $store->name;
                $storesArray[$k]['action'] = '<a href="' . route('admin.store.edit', $store) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                        . '<a href="javaScript:void(0);" class="btn btn-danger btn-xs delete" id="' . $store->id . '" ><i class="fa fa-trash"></i> Delete </a>';
            }
            $data['data'] = $storesArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function storeDelete(Request $request) {
        try {
            $store = Store::find($request->id);
            if ($store) {
                $store->delete();
                return ['status' => true, "message" => "store deleted."];
            } else {
                return ['status' => false, "message" => "Something went be wrong."];
            }
        } catch (\Exception $ex) {
            return ['status' => false, "message" => $ex->getMessage()];
        }
    }

    public function storeEdit(Request $request, store $store) {
        try {

            if ($request->isMethod("post")) {
                $validator = Validator::make($request->all(), [
                            'store_name' => [
                                'bail',
                                'required',
                              
                            ],
                            'icon1' => ['mimes:jpeg,jpg,png'],
                            'icon2' => ['mimes:jpeg,jpg,png'],
                            'icon3' => ['mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.store.edit', $store->id)->withErrors($validator)->withInput();
                }

                if ($request->hasFile('icon1')) {
                    $storeImg1 = Store::selectRaw('image1 img1')->find($store->id);
                    Storage::disk('public')->delete('store/' . $storeImg1->img1);
                    $icon1 = $request->file("icon1");
                    $iconImage1 = Storage::disk('public')->put('store', $icon1);
                    $icon_file_name1 = basename($iconImage1);
                    $store->image1 = $icon_file_name1;
                }
                if ($request->hasFile('icon2')) {
                    $storeImg2 = Store::selectRaw('image2 img2')->find($store->id);
                    Storage::disk('public')->delete('store/' . $storeImg2->img2);
                    $icon2 = $request->file("icon2");
                    $iconImage2 = Storage::disk('public')->put('store', $icon2);
                    $icon_file_name2 = basename($iconImage2);
                    $store->image2 = $icon_file_name2;
                }
                if ($request->hasFile('ico3')) {
                    $storeImg3 = Store::selectRaw('image3 img3')->find($store->id);
                    Storage::disk('public')->delete('store/' . $storeImg3->img3);
                    $icon3 = $request->file("icon3");
                    $iconImage3 = Storage::disk('public')->put('store', $icon3);
                    $icon_file_name3 = basename($iconImage3);
                    $store->image3 = $icon_file_name3;
                }
                $store->name = $request->store_name;
                $store->address = $request->address;
                $store->timings = $request->timings;
                $store->email = $request->email;
                $store->phone = $request->phone;
                $store->direction = $request->direction;

                if ($store->save()) {
                    return redirect()->route('admin.store.index')->with('status', 'store has been updated successfully.');
                } else {
                    return redirect()->route('admin.store.index')->with('error', 'Something went be wrong.');
                }
            }

            return view('admin.store.edit', [
                'store' => $store
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.store.index')->with('error', $ex->getMessage());
        }
    }

    public function storeAdd(Request $request) {
        try {

            if ($request->isMethod("post")) {
                $validator = Validator::make($request->all(), [
                            'store_name' => [
                                'bail',
                                'required',
                                
                            ],
                            'icon1' => ['required', 'mimes:jpeg,jpg,png'],
                            'icon2' => ['mimes:jpeg,jpg,png'],
                            'icon3' => ['mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.store.add')->withErrors($validator)->withInput();
                }
                $store = new Store();
                if ($request->hasFile('icon1')) {
                    $icon1 = $request->file("icon1");
                    $iconImage1 = Storage::disk('public')->put('store', $icon1);
                    $icon_file_name1 = basename($iconImage1);
                    $store->image1 = $icon_file_name1;
                }
                if ($request->hasFile('icon2')) {
                    $icon2 = $request->file("icon2");
                    $iconImage2 = Storage::disk('public')->put('store', $icon2);
                    $icon_file_name2 = basename($iconImage2);
                    $store->image2 = $icon_file_name2;
                }

                if ($request->hasFile('icon3')) {
                    $icon3 = $request->file("icon3");
                    $iconImage3 = Storage::disk('public')->put('store', $icon3);
                    $icon_file_name3 = basename($iconImage3);
                    $store->image3 = $icon_file_name3;
                }


                $store->name = $request->store_name;
                $store->address = $request->address;
                $store->timings = $request->timings;
                $store->email = $request->email;
                $store->phone = $request->phone;
                $store->direction = $request->direction;
                $store->is_active = 1;

                if ($store->save()) {
                    return redirect()->route('admin.store.index')->with('status', 'store has been updated successfully.');
                } else {
                    return redirect()->route('admin.store.index')->with('error', 'Something went be wrong.');
                }
            }

            return view('admin.store.add');
        } catch (\Exception $ex) {
            return redirect()->route('admin.store.index')->with('error', $ex->getMessage());
        }
    }

    public function storeStatus(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $store = Store::findOrFail($request->record_id);
                $store->is_active = $request->status;
                $store->updated_at = Carbon::now();
                if ($store->save()) {
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