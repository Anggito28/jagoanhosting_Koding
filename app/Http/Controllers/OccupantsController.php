<?php

namespace App\Http\Controllers;

use App\Models\Occupants;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOccupantsRequest;
use App\Http\Requests\UpdateOccupantsRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OccupantsController extends Controller
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
        $occupants = Occupants::all();

        return view('occupants.index', compact(['occupants']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last = \App\Models\Occupants::orderBy('created_at', 'desc')->first();
        // dd($last);
        if ($last) {
            $last = $last->registration_number;
            $last = substr($last, 6);
            $last = (int) $last;
            $last++;
            $last = str_pad($last, 7, '0', STR_PAD_LEFT);
            $last =  $last;
        } else {
            $last =  '0000001';
        }
        $categories = Category::all();
        return view('occupants.create', compact(['categories', 'last']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOccupantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Occupants::create($request->all());
            return redirect()->route('occupants.index')
                ->with('success', 'Data pasien berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Data pasien gagal ditambahkan! ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Occupants  $occupants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $readonly = true;
        $occupants = Occupants::findOrFail($id);
        $categories = Category::all();
        return view('occupants.create', compact(['occupants', 'categories', 'readonly']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Occupants  $occupants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupants = Occupants::findOrFail($id);
        $categories = Category::all();
        return view('occupants.create', compact(['occupants', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOccupantsRequest  $request
     * @param  \App\Models\Occupants  $occupants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $patient = Occupants::findOrFail($id);
            $patient->update($request->all());
            return redirect()->route('occupants.index')
                ->with('success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Data gagal diubah! ' . $th->getMessage() . '');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occupants  $occupants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $patient = Occupants::findOrFail($id);
            $patient->delete();
            return redirect()->back()
                ->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Data gagal dihapus!' . $th->getMessage());
        }
    }
}
