<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $penerima = new Penerima;
        $penerima->nama = $request->nama;
        $penerima->nomor_telepon = $request->nomor_telepon;
        $penerima->save();

        return redirect('admin/penerima');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
