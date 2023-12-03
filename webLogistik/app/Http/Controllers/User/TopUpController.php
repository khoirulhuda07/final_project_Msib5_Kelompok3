<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Dompet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\TopUp;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class TopUpController extends Controller
{
    public function index()
    {
        $user = Users::findOrFail(Auth::id());
        $dompet = Dompet::where('id', $user->dompet_id)->first();
        $topup = TopUp::where('dompet_id', $user->id)->get();
        $uang = ['10000', '20000', '50000', '100000'];

        return view("user.topup.index",  compact('dompet', 'topup', 'uang') );
    }

    public function cekSaldo() {
        // $user = Users::findOrFail(Auth::id());
        // $dompet = Dompet::where('id', $user->dompet_id)->first();

        // return view('user.template.header', compact('dompet'));
    }

    public function store(Request $request)
    {
        $topup = new TopUp;
        $topup->saldo = $request->saldo;
        $topup->bonus = $request->bonus;
        $topup->dompet_id = $request->dompet_id;
        $topup->waktu = $request->waktu;
        $topup->save();

        return back()->with('status', 'Proses TopUp Berhasil!!');
    }

    public function exportPDF(string $id) {
        $saveName = 'Laporan TopUp ' . date('y-m-d') . '.pdf';
        $laporan = TopUp::get()->where('dompet_id', $id);
        $pdf = PDF::loadview('user.topup.laporanPDF', compact('laporan'));

        return $pdf->download($saveName);
    }
}
