<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurir;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengiriman;
use App\Models\Users;

class homeKurirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Users::findOrFail(Auth::id());
        $pengiriman = Pengiriman::get();
        $TLpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.id', '=', 'layanan.kurir_id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->count();
        $penerima = Pengiriman::join('penerima', 'penerima.id', '=', 'pengiriman.penerima_id')
            ->select('pengiriman.lokasi_tujuan AS tujuan', 'penerima.nama AS nama', 'penerima.nomor_telepon AS nomor')
            ->get();
        $BLpengiriman = Pengiriman::where('status', 'terkirim')->count();
        $SLpengiriman = Pengiriman::where('status', 'pengiriman')->count();

        return view("kurir.home",  compact('TLpengiriman', 'penerima', 'BLpengiriman', 'SLpengiriman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function maps()
    {
        //
        return view('kurir.maps');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profile()
    {
        //
        $user = Users::findOrFail(Auth::id());
        $kurir = Kurir::where('nama_kurir', 'joni')->first();

        return view('Kurir.profile', compact('kurir'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
