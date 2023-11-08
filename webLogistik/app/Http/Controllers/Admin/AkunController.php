<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Akun;
use App\Models\Dompet;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = Akun::all();
        return view("admin.akun.index", ['akun' => $akun]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dompet = Dompet::all();
        $jabatan = ['user', 'admin'];
        return view('admin.akun.create', compact('dompet', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $akun = new Akun;
        $akun->fullname = $request->fullname;
        $akun->username = $request->username;
        $akun->email = $request->email;
        $akun->password = $request->password;
        $akun->level = $request->level;
        $akun->alamat = $request->alamat;
        $akun->dompet_id = $request->dompet_id;
        $akun->save();

        return redirect('admin/akun');

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
