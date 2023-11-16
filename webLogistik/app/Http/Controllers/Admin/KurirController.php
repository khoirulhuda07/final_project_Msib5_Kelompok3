<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kurir;

class KurirController extends Controller
{
    public function index()
    {
        $kurir = Kurir::all();
        return view("admin.kurir.index", compact("kurir"));
    }

    public function create()
    {
        return view('admin.kurir.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kurir'=> 'required | unique:kurir | max:45',
                'nomor_telepon'=> 'required | numeric',
                'jadwal'=> 'required | max:45',
            ],
            [
                'nama_kurir.required' => 'Wajib diisi', 
                'nomor_telepon.required' => 'Wajib diisi', 
                'jadwal.required' => 'Wajib diisi', 

                'nomor_telepon.numeric' => 'Harus Angka',
                'nama_kurir.unique' => 'Nama Sudah Terdaftar',
                'nama_kurir.max' => 'Maksimal 45 Karakter',
                'jadwal.max' => 'Maksimal 45 Karakter',
            ]
        );

        $kurir = new kurir;
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->save();
        return redirect('admin/kurir')->with('success','Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        $kurir = kurir::all()
        ->where('id', $id);
        return view("admin.kurir.detail", compact("kurir"));
    }

    public function edit(string $id)
    {
        $dompet = kurir::all()
        ->where('id', $id);
        return view("admin.kurir.edit", compact("kurir"));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kurir'=> 'required | max:45',
                'nomor_telepon'=> 'required | numeric',
                'jadwal'=> 'required | max:45',
            ],
            [
                'nama_kurir.required' => 'Wajib diisi', 
                'nomor_telepon.required' => 'Wajib diisi', 
                'jadwal.required' => 'Wajib diisi', 

                'nomor_telepon.numeric' => 'Harus Angka',
                'nama_kurir.max' => 'Maksimal 45 Karakter',
                'jadwal.max' => 'Maksimal 45 Karakter',
            ]
        );

        $kurir = kurir ::find($id);
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->save();
        return redirect('admin/kurir')->with('success','Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        kurir::find($id)->delete();
        return redirect('admin/kurir')->with('success','Data Berhasil Dihapus!!');
    }
    }