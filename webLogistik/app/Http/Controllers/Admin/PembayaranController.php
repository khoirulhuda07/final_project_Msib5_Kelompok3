<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Pembayaran;
use App\Models\Akun;
use App\Models\Pengiriman;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view("admin.pembayaran.index", ['pembayaran' => $pembayaran]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $akun = Akun::all();
        $pengiriman = Pengiriman::all();
        $bayar = ['Dompetku', 'COD'];
        return view('admin.pembayaran.create', compact('akun', 'pengiriman', 'bayar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'metode' => 'required',
                'harga_total' => 'required|numeric',
                'keterangan' => 'required|max:45',
                'pengiriman_id' => 'required|integer',
                'akun_id' => 'required|integer',
            ],
            [
                'metode.required' => 'data wajib diisi',
                'harga_total.required' => 'data wajib diisi',
                'harga_total.numeric' => 'data wajib dipilih',
                'keterangan.required ' => 'data wajib diisi',
                'keterangan.max' => 'maksimal 45 karakter',
                'pengiriman_id.required' => 'data wajib diisi',
                'pengiriman_id.integer' => 'data wajib dipilih',
                'akun_id.required' => 'data wajib diisi',
                'akun_id.integer' => 'data wajib dipilih',
            ]
        );
        $pembayaran = new Pembayaran;
        $pembayaran->metode = $request->metode;
        $pembayaran->harga_total = $request->harga_total;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->pengiriman_id = $request->pengiriman_id;
        $pembayaran->akun_id = $request->akun_id;
        $pembayaran->save();

        return redirect('admin/pembayaran')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pembayaran = pembayaran::all()->where('id', $id);
        return view('admin.pembayaran.detail', ['pembayaran' => $pembayaran]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 
        $akun = Akun::all();
        $pembayaran = pembayaran::all()->where('id', $id);
        $pengiriman = Pengiriman::all();
        $bayar = ['dompetku', 'COD'];
        return view('admin.pembayaran.edit', compact('akun', 'pembayaran', 'pengiriman', 'bayar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pembayaran = pembayaran::find($id);
        $pembayaran->metode = $request->metode;
        $pembayaran->harga_total = $request->harga_total;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->pengiriman_id = $request->pengiriman_id;
        $pembayaran->akun_id = $request->akun_id;
        $pembayaran->save();

        return redirect('admin/pembayaran')->with('success', 'Data Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pembayaran = pembayaran::find($id);
        $pembayaran->delete();
        return redirect('admin/pembayaran')->with('success', 'Data Berhasil Dihapus!!');
    }
}
