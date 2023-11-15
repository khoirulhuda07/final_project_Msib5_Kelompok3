<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kurir;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kurir = Kurir::all();
        return view("admin.kurir.index", compact("kurir"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.kurir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $kurir = new kurir;
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->save();
        return redirect('admin/kurir')->with('success','Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kurir = kurir::all()
        ->where('id', $id);
        return view("admin.kurir.detail", compact("kurir"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dompet = kurir::all()
        ->where('id', $id);
        return view("admin.kurir.edit", compact("kurir"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $kurir = kurir ::find($id);
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->save();
        return redirect('admin/kurir')->with('success','Data Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        kurir::find($id)->delete();
        return redirect('admin/kurir')->with('success','Data Berhasil Dihapus!!');
    }
    }