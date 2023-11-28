<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Akun;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\TopUp;

class TopUpController extends Controller
{
    public function index()
    {
        $topup = TopUp::all();
        return view("user.topup.index", compact("topup"));
    }

    public function create()
    {
        // $akun = Akun::get();
        // return view ("user.dompet", compact('akun'));
    }

    public function store(Request $request)
    {
        $topup = new TopUp;
        $topup->saldo = $request->saldo;
        $topup->bonus = $request->bonus;
        $topup->dompet_id = $request->dompet_id;
        $topup->waktu = $request->waktu;
        $topup->save();

        return redirect('user/dompet')->with('success', 'Proses TopUp Berhasil!!');
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

    public function exportPDF() {
        $saveName = 'Laporan TopUp ' . date('y-m-d') . '.pdf';
        $topup = TopUp::all();
        $pdf = PDF::loadview('user.topup.laporanPDF', ['laporanTopUp'=> $topup])->setPaper('a4', 'landscape');

        // return $pdf->download($saveName);
        return $pdf->stream();
    }
}
