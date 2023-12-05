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
        // $snapToken = 0;

        return view("user.topup.index",  compact('dompet', 'topup', 'uang') );
    }

    public function cekSaldo() {
        // $user = Users::findOrFail(Auth::id());
        // $dompet = Dompet::where('id', $user->dompet_id)->first();

        // return view('user.template.header', compact('dompet'));
    }

    public function store(Request $request)
    {
        // $user = Users::findOrFail(Auth::id());
        // $dompet = Dompet::where('id', $user->dompet_id)->first();
        // $topup = TopUp::where('dompet_id', $user->id)->get();
        // $uang = ['10000', '20000', '50000', '100000'];
        
        $bayar = $request->saldo;

        $topup = new TopUp;
        $topup->saldo = $bayar;
        $topup->bonus = $request->bonus;
        $topup->dompet_id = $request->dompet_id;
        $topup->waktu = $request->waktu;
        $topup->save();
        
        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => $bayar,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => auth()->user()->username,
        //         'email' => auth()->user()->email,
        //     ),
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return view('user.topup.index', compact('dompet', 'topup', 'uang', 'snapToken'));

        return back()->with('status', 'Proses TopUp Berhasil!!');
    }

    public function exportPDF(string $id) {
        $saveName = 'Laporan TopUp ' . date('y-m-d') . '.pdf';
        $laporan = TopUp::get()->where('dompet_id', $id);
        $pdf = PDF::loadview('user.topup.laporanPDF', compact('laporan'));

        return $pdf->download($saveName);
    }
}
