<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dompet;

class DompetController extends Controller
{
    public function index()
    {
        $dompet = Dompet::all();
        return view("admin.dompet.index", ['dompet' => $dompet]);
    }

    public function create()
    {
        return view ('admin.dompet.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'saldo'=> 'required | numeric',
                'bonus'=> 'required | numeric',
            ],
            [
                'saldo.required' => 'Wajib diisi', 
                'bonus.required' => 'Wajib diisi', 

                'saldo.numeric' => 'Harus Angka',
                'bonus.numeric' => 'Harus Angka',
            ]
        );

        $dompet = new Dompet;
        $dompet->saldo = $request->saldo;
        $dompet->bonus = $request->bonus;
        $dompet->save();
        return redirect('admin/dompet')->with('success','Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        $dompet = dompet::all()
        ->where('id', $id);
        return view("admin.dompet.detail", compact("dompet"));
    }

    public function edit(string $id)
    {
        $dompet = Dompet::all()
        ->where('id', $id);
        return view("admin.dompet.edit", compact("dompet"));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'saldo'=> 'required | numeric',
                'bonus'=> 'required | numeric',
            ],
            [
                'saldo.required' => 'Wajib diisi', 
                'bonus.required' => 'Wajib diisi', 

                'saldo.numeric' => 'Harus Angka',
                'bonus.numeric' => 'Harus Angka',
            ]
        );

        $dompet = dompet ::find($id);
        $dompet->saldo = $request->saldo;
        $dompet->bonus = $request->bonus;
        $dompet->save();
        return redirect('admin/dompet')->with('success','Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        dompet::find($id)->delete();
        return redirect('admin/dompet')->with('success','Data Berhasil Dihapus!!');
    }
}
