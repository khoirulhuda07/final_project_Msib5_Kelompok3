<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Akun;
use App\Models\Kurir;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use App\Models\Pengiriman;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengiriman = Pengiriman::all();
        return view("admin.pengiriman.index", ['pengiriman'=> $pengiriman]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paket = Paket::all();
        $layanan = Layanan::all();
        $penerima = Penerima::all();
        $akun = Akun::all();
        $kurir = Kurir::all();
        return view('admin.pengiriman.create', compact('paket', 'layanan', 'penerima', 'akun', 'kurir'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode'=> 'required | max:45 | unique:pengiriman',
            'tanggal'=> 'required',
            'lokasi_tujuan'=> 'required | max:45',
            'paket_id'=> 'required | numeric',
            'layanan_id'=> 'required | numeric',
            'penerima_id'=> 'required | numeric',
            'akun_id'=> 'required | numeric',
            'kurir_id'=> 'required | numeric',
        ],
        [
            'kode.required' => 'Wajib diisi', 
            'tanggal.required' => 'Wajib diisi', 
            'lokasi_tujuan.required' => 'Wajib diisi', 

            'paket_id.numeric' => 'Wajib dipilih', 
            'layanan_id.numeric' => 'Wajib dipilih', 
            'penerima_id.numeric' => 'Wajib dipilih', 
            'akun_id.numeric' => 'Wajib dipilih', 
            'kurir_id.numeric' => 'Wajib dipilih', 

            'kode.max' => 'Maksimal 45 Karakter',
            'lokasi_tujuan.max' => 'Maksimal 45 Karakter',
            
            'kode.unique' => 'Data Sudah Ada',
        ]
        );

        $pengiriman = new Pengiriman;
        $pengiriman->kode = $request->kode;
        $pengiriman->tanggal = $request->tanggal;
        $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        $pengiriman->paket_id = $request->paket_id;
        $pengiriman->layanan_id = $request->layanan_id;
        $pengiriman->penerima_id = $request->penerima_id;
        $pengiriman->akun_id = $request->akun_id;
        $pengiriman->kurir_id = $request->kurir_id;
        $pengiriman->save();

        return redirect('admin/pengiriman')->with('success','Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengiriman = Pengiriman::all()->where('id', $id);
        return view("admin.pengiriman.detail", ['pengiriman'=> $pengiriman]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengiriman = Pengiriman::all()->where('id', $id);
        $paket = Paket::all();
        $layanan = Layanan::all();
        $penerima = Penerima::all();
        $akun = Akun::all();
        $kurir = Kurir::all();
        return view('admin.pengiriman.edit', ['pengiriman'=> $pengiriman], compact('paket', 'layanan', 'penerima', 'akun', 'kurir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode'=> 'required | max:45',
            'tanggal'=> 'required',
            'lokasi_tujuan'=> 'required | max:45',
            'paket_id'=> 'required | numeric',
            'layanan_id'=> 'required | numeric',
            'penerima_id'=> 'required | numeric',
            'akun_id'=> 'required | numeric',
            'kurir_id'=> 'required | numeric',
        ],
        [
            'kode.required' => 'Wajib diisi', 
            'tanggal.required' => 'Wajib diisi', 
            'lokasi_tujuan.required' => 'Wajib diisi', 

            'paket_id.numeric' => 'Wajib dipilih', 
            'layanan_id.numeric' => 'Wajib dipilih', 
            'penerima_id.numeric' => 'Wajib dipilih', 
            'akun_id.numeric' => 'Wajib dipilih', 
            'kurir_id.numeric' => 'Wajib dipilih', 

            'kode.max' => 'Maksimal 45 Karakter',
            'lokasi_tujuan.max' => 'Maksimal 45 Karakter',
        ]
        );

        $pengiriman = Pengiriman::find( $id );
        $pengiriman->kode = $request->kode;
        $pengiriman->tanggal = $request->tanggal;
        $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        $pengiriman->paket_id = $request->paket_id;
        $pengiriman->layanan_id = $request->layanan_id;
        $pengiriman->penerima_id = $request->penerima_id;
        $pengiriman->akun_id = $request->akun_id;
        $pengiriman->kurir_id = $request->kurir_id;
        $pengiriman->save();

        return redirect('admin/pengiriman')->with('success','Data Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengiriman::find($id)->delete();
        return redirect('admin/pengiriman')->with('success','Data Berhasil Dihapus!!');
    }
}
