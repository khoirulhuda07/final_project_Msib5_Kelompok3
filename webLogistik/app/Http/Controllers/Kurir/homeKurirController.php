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
            ->join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.id', '=', 'layanan.kurir_id')
            ->select('pengiriman.lokasi_tujuan AS tujuan', 'penerima.nama AS nama', 'penerima.nomor_telepon AS nomor', 'pengiriman.status AS status', 'pengiriman.id AS id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->get();
        $PBpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.id', '=', 'layanan.kurir_id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->where('status', 'penjemputan')
            ->count();
        $SLpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.id', '=', 'layanan.kurir_id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->where('status', 'terkirim')
            ->count();
        $BLpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.id', '=', 'layanan.kurir_id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->where('status', 'pengiriman')
            ->count();

        // if ($penerima->status == 'pengiriman') {
        //     $status = ['pengiriman', 'terkirim'];
        // } else {
        //     $status = ['penjemputan', 'pengiriman'];
        // }
            
        return view("kurir.home",  compact('TLpengiriman', 'penerima', 'PBpengiriman', 'BLpengiriman', 'SLpengiriman'));
    }

    public function store(Request $request, string $id)
    {
        $pengiriman = Pengiriman::find($id);
        $pengiriman->status = $request->status;
        $pengiriman->save();

        return back();
    }

    public function maps()
    {
        return view('kurir.maps');
    }

    public function profile()
    {
        $user = Users::findOrFail(Auth::id());
        $kurir = Kurir::where('nama_kurir', $user->fullname)->first();

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
