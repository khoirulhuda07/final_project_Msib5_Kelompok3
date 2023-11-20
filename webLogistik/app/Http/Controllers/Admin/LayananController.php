<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kurir;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view("admin.layanan.index", ["layanan" => $layanan]);
    }

    public function create()
    {
        $kurir = Kurir::all();
        return view('admin.layanan.create', compact('kurir'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|max:45',
                'biaya' => 'required|numeric',
                'kurir_id' => 'required|numeric',
            ],
            [
                'nama.required' => 'Layanan barang harus diisi',
                'biaya.required' => 'Biaya Layanan harus diisi',
                'kurir_id.numeric' => 'Wajib Dipilih',
            ]
        );
        //
        $layanan = new layanan;
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $layanan->kurir_id = $request->kurir_id;
        $layanan->save();
        return redirect('admin/layanan')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $layanan = layanan::all()
            ->where('id', $id);
        return view("admin.layanan.detail", ['layanan' => $layanan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $layanan = layanan::all()
            ->where('id', $id);
        $kurir = Kurir::all();
        return view("admin.layanan.edit", compact("layanan", "kurir"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|max:45',
                'biaya' => 'required|numeric',
                'kurir_id' => 'required|numeric',
            ],
            [
                'nama.required' => 'Layanan barang harus diisi',
                'biaya.required' => 'Biaya Layanan harus diisi',
                'kurir_id.numeric' => 'Wajib Dipilih',
            ]
        );
        //
        $layanan = layanan::find($id);
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $layanan->kurir_id = $request->kurir_id;
        $layanan->save();
        return redirect('admin/layanan')->with('success', 'Data Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        layanan::find($id)->delete();
        return redirect('admin/layanan')->with('success', 'Data Berhasil Dihapus!!');
    }
}
