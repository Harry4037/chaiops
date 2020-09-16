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
                $query->where('description', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $stores = $query->take($limit)->offset($offset)->latest()->get();

            $storesArray = [];
            foreach ($stores as $k => $store) {
                $storesArray[$k]['image_name'] = '<img class="img-bordered" height="60" width="100" src=' . $store->image . '>';
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
                            'icon' => ['mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.store.edit', $store->id)->withErrors($validator)->withInput();
                }

                if ($request->hasFile('icon')) {
                    $storeImg = Store::selectRaw('image_name img')->find($store->id);
                    Storage::disk('public')->delete('store/' . $storeImg->img);
                    $icon = $request->file("icon");
                    $iconImage = Storage::disk('public')->put('store', $icon);
                    $icon_file_name = basename($iconImage);
                    $store->image = $icon_file_name;
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
                            'icon' => ['required', 'mimes:jpeg,jpg,png'],
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.store.add')->withErrors($validator)->withInput();
                }
                $store = new Store();
                if ($request->hasFile('icon')) {
                    $icon = $request->file("icon");
                    $iconImage = Storage::disk('public')->put('store', $icon);
                    $icon_file_name = basename($iconImage);
                    $store->image = $icon_file_name;
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