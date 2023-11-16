<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\kurir;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use App\Models\Pengiriman;
use App\Models\Pembayaran;
use App\Models\Dompet;

class PengirimanUserController extends Controller
{
    public function index()
    {
        $pengiriman = pengiriman::all();
        $akun = akun::all();
        $kurir = kurir::all();
        $layanan = layanan::all();
        $pembayaran = pembayaran::all();
        $dompet = dompet::all();
        return view("user.pengirimanUser.index",['pengiriman'=>$pengiriman], compact('dompet','pembayaran','akun','kurir','layanan'));
    }
    public function update(request $resquest, string $id)
    {
        $dompet1 = Dompet::find($id);
        $bayar = $request->harga_total;
        $sisaSaldo = $dompet1->saldo - $bayar;

        $pembayaran = new pembayaran;
        $pembayaran->metode = $resquest->metode;
        $pembayaran->harga_total = $resquest->harga_total;
        $pembayaran->keterangan = $resquest->keterangan;
        $pembayaran->pengiriman_id = $request->pengiriman_id;
        $pembayaran->akun_id = $request->akun_id;
        $pembayaran->save();

        $dompet = dompet::find($id);
        $dompet->saldo = $sisaSaldo;
        $dompet->save();
        return redirect('user/pengirimanUser');
    }
}
