<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pengiriman;
use App\Models\Layanan;
use App\Models\Kurir;
use App\Models\Penerima;
use App\Models\Paket;
use App\Models\Dompet;


class DashboardController extends Controller
{
    // fungsi index
    public function index() {
        $pengiriman = Pengiriman::count();
        $layanan = Layanan::count();
        $kurir = Kurir::count();
        $penerima = Penerima::all();
        $paket = Paket::all();
        $saldo = DB::table('dompet')
        ->sum('saldo');
        $jkurir = DB::table('pengiriman')
        ->join('kurir', 'pengiriman.kurir_id', '=', 'kurir.id')
        ->selectRaw('kurir_id, kurir.nama_kurir as nama_kurir, COUNT(kurir_id) as jumlah')
        ->groupBy('kurir_id', 'kurir.nama_kurir')
        ->get();
        $jlayanan = DB::table('pengiriman')
        ->join('layanan', 'pengiriman.layanan_id', '=', 'layanan.id')
        ->selectRaw('layanan_id, layanan.nama_layanan as nama_layanan, count(layanan_id) as jumlah')
        ->groupBy('layanan_id', 'layanan.nama_layanan')
        ->get();
      
       
        return view("admin.dashboard", 
        compact('pengiriman', 'layanan', 'kurir', 'penerima', 'paket', 'saldo', 'jkurir', 'jlayanan'));
    }
}
