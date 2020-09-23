<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Corporate;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class CorporateController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.corporate.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function corporateList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = Corporate::query();
            if ($searchKeyword) {
                $query->where('name', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $corporates = $query->take($limit)->offset($offset)->latest()->get();

            $corporatesArray = [];
            foreach ($corporates as $k => $corporate) {
                $corporatesArray[$k]['name'] = $corporate->name;
                $corporatesArray[$k]['email'] = $corporate->email;
                $corporatesArray[$k]['mob'] = $corporate->mob;
                $corporatesArray[$k]['action'] = '<a href="' . route('admin.corporate.view', $corporate) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View </a>';
            }
            $data['data'] = $corporatesArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function corporateView(Request $request, corporate $corporate) {
        try {

            return view('admin.corporate.view', [
                'corporate' => $corporate
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.corporate.index')->with('error', $ex->getMessage());
        }
    }

}