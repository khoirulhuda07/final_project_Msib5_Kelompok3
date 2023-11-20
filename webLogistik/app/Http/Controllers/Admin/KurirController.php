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
                'nama' => 'required |  max:45',
                'no_tlp' => 'required | numeric',
                'jadwal' => 'required | max:45',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'no_tlp.required' => 'Wajib diisi',
                'jadwal.required' => 'Wajib diisi',

                'no_tlp.numeric' => 'Harus Angka',
                'nama.unique' => 'Nama Sudah Terdaftar',
                'nama.max' => 'Maksimal 45 Karakter',
                'jadwal.max' => 'Maksimal 45 Karakter',
            ]
        );

        $kurir = new kurir;
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->save();
        return redirect('admin/kurir')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        $kurir = kurir::all()
            ->where('id', $id);
        return view("admin.kurir.detail", compact("kurir"));
    }

    public function edit(string $id)
    {
        $kurir = kurir::all()
            ->where('id', $id);
        return view("admin.kurir.edit", compact("kurir"));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required | max:45',
                'no_tlp' => 'required | numeric',
                'jadwal' => 'required | max:45',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'no_tlp.required' => 'Wajib diisi',
                'jadwal.required' => 'Wajib diisi',

                'no_tlp.numeric' => 'Harus Angka',
                'nama.max' => 'Maksimal 45 Karakter',
                'jadwal.max' => 'Maksimal 45 Karakter',
            ]
        );

        $kurir = kurir::find($id);
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->save();
        return redirect('admin/kurir')->with('success', 'Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        kurir::find($id)->delete();
        return redirect('admin/kurir')->with('success', 'Data Berhasil Dihapus!!');
    }
}
