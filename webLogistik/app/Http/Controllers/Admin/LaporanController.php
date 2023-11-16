<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Pengiriman;

class LaporanController extends Controller
{
    public function index()
    {
        $laporanKirim = Pengiriman::all();
        return view("admin.laporanKirim.index", ['laporanKirim'=> $laporanKirim]);
    }

    public function exportPDF() {
        $saveName = 'Laporan Pengiriman ' . date('y-m-d') . '.pdf';
        $pengiriman = Pengiriman::all();
        $pdf = PDF::loadview('admin.laporanKirim.laporanPDF', ['laporanKirim'=> $pengiriman])->setPaper('a4', 'landscape');

        return $pdf->download($saveName);
    }
}
