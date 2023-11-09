<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Kurir;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use Illuminate\Http\Request;

use App\Models\Pengiriman;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengiriman = Pengiriman::all();
        return view("admin.pengiriman.index", ['pengiriman'=> $pengiriman]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paket = Paket::all();
        $layanan = Layanan::all();
        $penerima = Penerima::all();
        $akun = Akun::all();
        $kurir = Kurir::all();
        return view('admin.pengiriman.create', compact('paket', 'layanan', 'penerima', 'akun', 'kurir'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengiriman = new Pengiriman;
        $pengiriman->kode = $request->kode;
        $pengiriman->tanggal = $request->tanggal;
        $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        $pengiriman->paket_id = $request->paket_id;
        $pengiriman->layanan_id = $request->layanan_id;
        $pengiriman->penerima_id = $request->penerima_id;
        $pengiriman->akun_id = $request->akun_id;
        $pengiriman->kurir_id = $request->kurir_id;
        $pengiriman->save();

        return redirect('admin/pengiriman');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $pengiriman = Pengiriman::all()->where('id', $id);
        // return view("admin.pengiriman.index", ['pengiriman'=> $pengiriman]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengiriman = Pengiriman::all()->where('id', $id);
        $paket = Paket::all();
        $layanan = Layanan::all();
        $penerima = Penerima::all();
        $akun = Akun::all();
        $kurir = Kurir::all();
        return view('admin.pengiriman.edit', ['pengiriman'=> $pengiriman], compact('paket', 'layanan', 'penerima', 'akun', 'kurir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengiriman = Pengiriman::find( $request->id );
        $pengiriman->kode = $request->kode;
        $pengiriman->tanggal = $request->tanggal;
        $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        $pengiriman->paket_id = $request->paket_id;
        $pengiriman->layanan_id = $request->layanan_id;
        $pengiriman->penerima_id = $request->penerima_id;
        $pengiriman->akun_id = $request->akun_id;
        $pengiriman->kurir_id = $request->kurir_id;
        $pengiriman->save();

        return redirect('admin/pengiriman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengiriman::find($id)->delete();
        return redirect('admin/pengiriman');
    }
}
