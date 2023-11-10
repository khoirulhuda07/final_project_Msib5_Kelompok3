<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Akun;
use App\Models\Dompet;
use Illuminate\Support\Facades\Storage;

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

        $photo = $request->file('foto');
        $fileName = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'photo-user/'.$fileName;

        Storage::disk('public')->put($path, file_get_contents($photo));
        
        $akun = new Akun;
        $akun->fullname = $request->fullname;
        $akun->username = $request->username;
        $akun->email = $request->email;
        $akun->password = $request->password;
        $akun->level = $request->level;
        $akun->alamat = $request->alamat;
        $akun->foto = $fileName;
        $akun->dompet_id = $request->dompet_id;
        $akun->save();

        return redirect('admin/akun');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $akun = Akun::all()->where('id', $id);
        return view('admin.akun.detail', ['akun'=> $akun]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $akun = Akun::all()->where('id', $id);
        $dompet = Dompet::all();
        $jabatan = ['user', 'admin'];
        return view('admin.akun.edit', ['akun'=> $akun], compact('jabatan','dompet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $akun = Akun::find( $id );

        if ($request->hasFile('foto')) {
            $path = storage_path('app/public/photo-user'.$akun->foto);
            if (file_exists($path)) {
                Storage::delete($akun->foto);
            }
            $photo = $request->file('foto');
            $fileName = date('Y-m-d').$photo->getClientOriginalName();

            $photo->move(storage_path('app/public/photo-user'), $fileName);

            $akun->foto = $fileName;
        }

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Akun::find($id)->delete();
        return redirect('admin/akun');
    }
}
