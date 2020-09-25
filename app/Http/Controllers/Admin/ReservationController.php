<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;

class ReservationController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.reservation.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function reservationList(Request $request) {
        try {
            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');
            $searchKeyword = $request->get('search')['value'];

            $query = Reservation::query();
            if ($searchKeyword) {
                $query->where('name', 'LIKE', "%$searchKeyword%")->orWhere("email", "LIKE", "%$searchKeyword%");
            }
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $reservations = $query->take($limit)->offset($offset)->latest()->get();

            $reservationsArray = [];
            foreach ($reservations as $k => $reservation) {
                $reservationsArray[$k]['name'] = $reservation->name;
                $reservationsArray[$k]['email'] = $reservation->email;
                $reservationsArray[$k]['occassion'] = $reservation->occassion;
                $reservationsArray[$k]['action'] = '<a href="' . route('admin.reservation.view', $reservation) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> View </a>';
            }
            $data['data'] = $reservationsArray;
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function reservationView(Request $request, reservation $reservation) {
        try {

            return view('admin.reservation.view', [
                'reservation' => $reservation
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.reservation.index')->with('error', $ex->getMessage());
        }
    }

}