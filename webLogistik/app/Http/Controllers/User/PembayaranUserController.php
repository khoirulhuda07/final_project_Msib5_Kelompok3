<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Pembayaran;
use App\Models\Pengiriman;

class PembayaranUserController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $pembayaran = pembayaran::where('users_id', $user_id)->get();
        $pengiriman = pengiriman::all();
        return view("user.pembayaranUser.index", ['pembayaran' => $pembayaran], compact('pengiriman'));
    }

    public function exportPDF()
    {
        $saveName = 'Laporan Riwayat Pembayaran ' . date('y-m-d') . '.pdf';
        $user_id = auth()->id();
        $laporan = pembayaran::where('users_id', $user_id)->get();
        $pengiriman = pengiriman::all();

        $pdf = PDF::loadview('user.pembayaranUser.laporanPDF', compact('laporan', 'pengiriman'));

        return $pdf->download($saveName);
    }
}
