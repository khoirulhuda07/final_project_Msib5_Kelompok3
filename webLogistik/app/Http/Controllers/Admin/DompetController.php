<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dompet;

class DompetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dompet = Dompet::all();
        return view("admin.dompet.index", ['dompet' => $dompet]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('admin.dompet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dompet = new Dompet;
        $dompet->saldo = $request->saldo;
        $dompet->bonus = $request->bonus;
        $dompet->save();
        return redirect('admin/dompet')->with('success','Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dompet = dompet::all()
        ->where('id', $id);
        return view("admin.dompet.detail", compact("dompet"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dompet = Dompet::all()
        ->where('id', $id);
        return view("admin.dompet.edit", compact("dompet"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dompet = dompet ::find($id);
        $dompet->saldo = $request->saldo;
        $dompet->bonus = $request->bonus;
        $dompet->save();
        return redirect('admin/dompet')->with('success','Data Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dompet::find($id)->delete();
        return redirect('admin/dompet')->with('success','Data Berhasil Dihapus!!');
    }
}
