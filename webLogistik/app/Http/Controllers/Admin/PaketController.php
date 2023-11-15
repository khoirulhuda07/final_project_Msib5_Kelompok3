<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Paket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::all();
        return view("admin.paket.index", compact("paket"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'berat' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
        ],
        [
            'berat.required' => 'Berat barang harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ]);
        //
        $paket =  new paket;
        $paket->berat = $request->berat;
        $paket->deskripsi = $request->deskripsi;
        $paket->save();
        alert()->success('Success','Data berhasil ditambah');
        return redirect('admin/paket');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $paket = Paket::all()
        ->where('id', $id);
        return view("admin.paket.detail", ['paket'=> $paket], compact("paket"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $paket = Paket::all()
        ->where('id', $id);
        return view("admin.paket.edit", compact("paket"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'berat' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
        ],
        [
            'berat.required' => 'Berat barang harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ]);
        //
        $paket = Paket::find($id);
        $paket->berat = $request->berat;
        $paket->deskripsi = $request->deskripsi;
        $paket->save();
        return redirect('admin/paket');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Paket::find($id)->delete();
        alert()->success('Success','Data berhasil dihapus');
        return redirect('admin/paket');
    }
}
