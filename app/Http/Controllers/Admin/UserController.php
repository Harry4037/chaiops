<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

class UserController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.user.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function userList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = User::query();
//            if ($searchKeyword) {
//                $query->where(function($q) use($searchKeyword) {
//                    $q->where("name", "LIKE", "%$searchKeyword%")
//                            ->orWhere("email", "LIKE", "%$searchKeyword%")
//                            ->orWhere("mobile_number", "LIKE", "%$searchKeyword%");
//                });
//            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $users = $query->take($limit)->offset($offset)->latest()->get();

            $usersArray = [];
            foreach ($users as $k => $user) {
                $usersArray[$k]['name'] = $user->name;
                $usersArray[$k]['action'] = "";
                $checked_status = $user->is_block_admin ? "checked" : '';
                $usersArray[$k]['status'] = "<label class='c-switch c-switch-label c-switch-pill c-switch-success'>
                        <input class='c-switch-input update_status' type='checkbox' id=" . $user->id . " data-status=" . $user->is_block_admin . " " . $checked_status . ">
                        <span class='c-switch-slider' data-checked='✓' data-unchecked='✕'></span>
                      </label>";
                $usersArray[$k]['action'] = '<a href="#" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>&nbsp;';
            }

            $data['data'] = $usersArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function userStatus(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $user = User::findOrFail($request->record_id);
                $user->is_block_admin = $request->status;
                if ($user->save()) {
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
