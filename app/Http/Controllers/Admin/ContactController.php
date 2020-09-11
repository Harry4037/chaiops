<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class ContactController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.contact.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function contactList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query =Contact::query();
            if ($searchKeyword) {
                $query->where('name', 'LIKE', "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $contacts = $query->take($limit)->offset($offset)->latest()->get();

            $contactsArray = [];
            foreach ($contacts as $k => $contact) {
                $contactsArray[$k]['name'] = $contact->name;
                $contactsArray[$k]['email'] = $contact->email;
                $contactsArray[$k]['subject'] = $contact->subject;
                $contactsArray[$k]['action'] = '<a href="' . route('admin.contact.view', $contact) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View </a>';
            }
            $data['data'] = $contactsArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function contactView(Request $request, contact $contact) {
        try {

            return view('admin.contact.view', [
                'contact' => $contact
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.contact.index')->with('error', $ex->getMessage());
        }
    }

}