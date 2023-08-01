<?php

namespace App\Http\Controllers;

use App\Models\HealthService;
use App\Models\HouseService;
use App\Models\Occupants;
use App\Models\Patient;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }

    public function index()
    {
        //count patient by category
        $statusTinggal = Occupants::Where('status_tinggal', '=', 'Tetap')->count();
        $statusTinggal2 = Occupants::Where('status_tinggal', '=', 'Tidak Tetap')->count();
        $statusRumah = HouseService::Where('status', '=', 'Ditempati')->count();
        $statusRumah3 = HouseService::Where('status', '=', 'Kosong')->count();
        $keamanan = HouseService::Where('keamanan', '=', 'Lunas')->count();
        $kebersihan = HouseService::Where('kebersihan', '=', 'Lunas')->count();
        $homeservice = HouseService::count();
        return view('main', compact(['statusTinggal', 'statusTinggal2', 'statusRumah', 'statusRumah3', 'keamanan', 'kebersihan', 'homeservice']));
    }
}
