<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Models\Pengiriman;
use App\Models\Kurir;
use App\Models\Layanan;
use App\Models\Penerima;
use App\Models\Pembayaran;
use App\Http\Resources\LacakResource;
use App\Http\Resources\DetailLacakResource;
use App\Models\Users;

class LacakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1(){
        return view("homepage.lacakpaket.index");
    }
    
    public function index()
    {
        //
        $pengiriman = Pengiriman::all();
        $akun = Users::all();
        $kurir = Kurir::all();
        $penerima = Penerima::all();
        $pembayaran = Pembayaran::all();
        $layanan = Layanan::all();
        // return view("homepage.lacakpaket.index");
        //  return response()->json($pengiriman);
        return LacakResource::collection($pengiriman, $akun, $kurir, $penerima, $pembayaran, $layanan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode)
    {
        //
        $pengiriman = Pengiriman::find($kode);
        $akun = Users::all();
        $kurir = Kurir::all();
        return new DetailLacakResource($pengiriman, $akun, $kurir);
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
