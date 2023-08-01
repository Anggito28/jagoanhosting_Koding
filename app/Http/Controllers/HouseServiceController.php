<?php

namespace App\Http\Controllers;

use App\Models\HouseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHouseServiceRequest;
use App\Http\Requests\UpdateHouseServiceRequest;
use App\Models\Category;
use App\Models\Occupants;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HouseServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $services = HouseService::with('occupant', 'category')->get();

        return view('houseService.index', compact(['services']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $occupants = Occupants::all();
        $categories = Category::all();
        return view('houseService.create', compact(['occupants', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHouseServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            HouseService::create($request->all());
            return redirect()->route('pelayanan.index')
                ->with('success', 'Data Pelayanan berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error saat menambahkan data pelayanan!' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseService  $houseService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $readonly = true;
        $service = HouseService::with('oncupants', 'category')->find($id);
        $occupants = Occupants::all();
        $categories = Category::all();
        return view('houseService.create', compact(['service', 'readonly', 'occupants', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseService  $houseService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = HouseService::with('occupant', 'category')->find($id);
        $occupants = Occupants::all();
        $categories = Category::all();
        return view('houseService.create', compact(['service', 'occupants', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHouseServiceRequest  $request
     * @param  \App\Models\HouseService  $houseService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $service = HouseService::findOrFail($id);
            $service->update($request->all());
            return redirect()->route('pelayanan.index')
                ->with('success', 'Data Pelayanan berhasil diupdate!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error saat mengupdate data pelayanan! ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseService  $houseService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            HouseService::destroy($id);
            return redirect()->route('pelayanan.index')
                ->with('success', 'Data Pelayanan berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error saat menghapus data pelayanan!');
        }
    }

    public function houseServicePatient($id)
    {
        $occupants = Occupants::all();
        $categories = Category::all();
        return view('houseService.create', compact(['id', 'occupants', 'categories']));
    }
}
