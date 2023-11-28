<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Dompet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\TopUp;

class TopUpController extends Controller
{
    public function index(string $id)
    {
        $topup = TopUp::get()->where('dompet_id', $id);
        $dompet = Dompet::get()->where('id', $id);
        $uang = ['10000', '20000', '50000', '1000000'];
        return view("user.topup.index",  compact('dompet', 'topup', 'uang'));
    }

    public function create()
    {
        // $akun = Akun::get();
        // return view ("user.dompet", compact('akun'));
    }

    public function store(Request $request, string $id)
    {
        $topup = new TopUp;
        $topup->saldo = $request->saldo;
        $topup->bonus = $request->bonus;
        $topup->dompet_id = $request->dompet_id;
        $topup->waktu = $request->waktu;
        $topup->save();

        return redirect('user/dompetku/'.$id)->with('success', 'Proses TopUp Berhasil!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function exportPDF(string $id) {
        $saveName = 'Laporan TopUp ' . date('y-m-d') . '.pdf';
        $laporan = TopUp::get()->where('dompet_id', $id);
        $pdf = PDF::loadview('user.topup.laporanPDF', compact('laporan'));

        return $pdf->download($saveName);
    }
}
