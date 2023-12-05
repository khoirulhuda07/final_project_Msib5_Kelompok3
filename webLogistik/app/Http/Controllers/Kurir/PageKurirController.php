<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengiriman;
use App\Models\Users;

class PageKurirController extends Controller
{
    public function index()
    {
        $user = Users::findOrFail(Auth::id());
        $pengiriman = Pengiriman::get();
        $TLpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.id', '=', 'layanan.kurir_id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->count();
        $penerimaa = Pengiriman::join('penerima', 'penerima.id', '=', 'pengiriman.penerima_id')
            ->select('pengiriman.lokasi_tujuan AS tujuan', 'penerima.nama AS nama', 'penerima.nomor_telepon AS nomor')
            ->get();
        $BLpengiriman = Pengiriman::where('pengiriman', $pengiriman->status)->count();
        $SLpengiriman = Pengiriman::where('terkirim', $pengiriman->status)->count();

        return view("kurir.home",  compact('TLpengiriman', 'penerima', 'BLpengiriman', 'SLpengiriman'));
    }

    public function maps()
    {
        return view('kurir.maps');
    }

    public function profile()
    {
        $user = Users::findOrFail(Auth::id());
        $kurir = Kurir::where('nama_kurir', $user->fullname)->first();

        return view('kurir.profile', compact('kurir'));
    }
}
