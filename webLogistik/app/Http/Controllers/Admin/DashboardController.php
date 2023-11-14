<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pengiriman;
use App\Models\Layanan;
use App\Models\Kurir;

class DashboardController extends Controller
{
    // fungsi index
    public function index() {
        $pengiriman = Pengiriman::join("penerima", "penerima_id", "=", "penerima.id")
        ->join("layanan","layanan_id", "=", "layanan.id")
        ->select('pengiriman.*', 'penerima.nama AS username', 'layanan.nama_layanan AS namaLayanan')
        ->limit('5')
        ->get();
        $layanan = Layanan::all();
        $kurir = Kurir::all();

        return view("admin.dashboard", 
        compact('pengiriman', 'layanan', 'kurir'));
    }
}
