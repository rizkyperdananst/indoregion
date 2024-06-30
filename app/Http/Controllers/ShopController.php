<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Shop;
use App\Models\Village;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops =  Shop::all();
        $provinces = Province::all();

        return view('shop.index', compact('shops', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getRegency($id)
    {
        $regency = Regency::where('province_id', $id)->get();
        return response()->json($regency);
    }

    
    public function getDistrict($id)
    {
        $district = District::where('regency_id', $id)->get();
        return response()->json($district);
    }

        
    public function getVillage($id)
    {
        $village = Village::where('district_id', $id)->get();
        return response()->json($village);
    }

    public function create()
    {
        $provinces = Province::all();

        return view('shop.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'province_id' => 'required|not_in:Pilih Provinsi',
            'regency_id' => 'required|not_in:Pilih Kota / Kabupaten',
            'district_id' => 'required|not_in:Pilih Kecamatan',
            'village_id' => 'required|not_in:Pilih Desa / Kelurahan',
        ]);

        $shop = Shop::create($validator);

        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shop::find($id);

        return view('shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
