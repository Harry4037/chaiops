<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Franchise;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class FranchiseController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.franchise.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function franchiseList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = Franchise::query();
            if ($searchKeyword) {
                $query->where('name', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $franchises = $query->take($limit)->offset($offset)->latest()->get();

            $franchisesArray = [];
            foreach ($franchises as $k => $franchise) {
                $franchisesArray[$k]['name'] = $franchise->name;
                $franchisesArray[$k]['email'] = $franchise->email;
                $franchisesArray[$k]['mob'] = $franchise->mob;
                $franchisesArray[$k]['location'] = $franchise->location;
                $franchisesArray[$k]['state'] = $franchise->state;
                $franchisesArray[$k]['plan'] = $franchise->plan;
                $franchisesArray[$k]['action'] = '<a href="' . route('admin.franchise.view', $franchise) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View </a>';
            }
            $data['data'] = $franchisesArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function franchiseView(Request $request, franchise $franchise) {
        try {

            return view('admin.franchise.view', [
                'franchise' => $franchise
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.franchise.index')->with('error', $ex->getMessage());
        }
    }

}