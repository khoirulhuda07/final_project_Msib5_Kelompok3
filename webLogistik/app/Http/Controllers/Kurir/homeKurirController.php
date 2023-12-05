<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengiriman;
use App\Models\Kurir;
use App\Models\Users;

class homeKurirController extends Controller
{
    public function index()
    {
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

    public function maps()
    {
        return view('kurir.maps');
    }

    public function profile()
    {
        $user = Users::findOrFail(Auth::id());
        $kurir = Kurir::where('nama_kurir', 'joni')->first();

        return view('Kurir.profile', compact('kurir'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
