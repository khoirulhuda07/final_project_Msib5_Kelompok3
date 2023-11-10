<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Layanan;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view("admin.layanan.index", compact("layanan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $layanan = new layanan;
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $layanan->save();
        return redirect('admin/layanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $layanan = layanan::all()
        ->where('id', $id);
        return view("admin.layanan.detail", ['layanan'=> $layanan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $layanan = layanan::all()
        ->where('id', $id);
        return view("admin.layanan.edit", compact("layanan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $layanan = layanan::find($id);
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $layanan->save();
        return redirect('admin/layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        layanan::find($id)->delete();
        return redirect('admin/layanan');
    }
}
