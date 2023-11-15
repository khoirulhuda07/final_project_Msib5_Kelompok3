<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Penerima;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerima = Penerima::all();
        return view("admin.penerima.index", compact("penerima"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penerima.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|max:45',
                'nomor_telepon' => 'required|max:45',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'nomor_telepon.required' => 'wajib diisi',
            ]
        );

        $penerima = new Penerima;
        $penerima->nama = $request->nama;
        $penerima->nomor_telepon = $request->nomor_telepon;
        $penerima->save();

        return redirect('admin/penerima')->with('success','Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $penerima = penerima::all()->where('id', $id);
        return view('admin.penerima.detail', ['penerima' => $penerima]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $penerima = penerima::all()->where('id', $id);
        return view('admin.penerima.edit', compact('penerima'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $penerima = penerima::find($id);
        $penerima->nama = $request->nama;
        $penerima->nomor_telepon = $request->no_tlp;
        $penerima->save();

        return redirect('admin/penerima')->with('success','Data Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        penerima::find($id)->delete();
        return redirect('admin/penerima')->with('success','Data Berhasil Dihapus!!');
    }
}
