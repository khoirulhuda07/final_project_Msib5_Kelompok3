<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Models\Dompet;
use App\Models\TopUp;
use App\Models\Users;

class TopUpController extends Controller
{
    public function index()
    {
        $user = Users::findOrFail(Auth::id());
        $dompet = Dompet::where('id', $user->dompet_id)->first();
        $topup = TopUp::where('dompet_id', $user->id)->get();
        $uang = ['10000', '20000', '50000', '100000'];

        return view("user.topup.index",  compact('dompet', 'topup', 'uang'));
    }

    public function store(Request $request)
    {
        $external_id = Str::random(10);
        $bayar = $request->saldo;
        
        $topup = new TopUp;
        $topup->topup_no = $external_id;
        $topup->saldo = $bayar;
        $topup->bonus = $request->bonus;
        $topup->dompet_id = $request->dompet_id;
        $topup->topup_status = 'UnPaid';
        $topup->waktu = $request->waktu;
        $topup->save();
        
        return back();
    }

    public function payment($id)
    {
        $topupID = TopUp::where('topup_no', $id)->first();

        $bayar = $topupID->saldo;

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $bayar,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->username,
                'email' => auth()->user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        return view("user.topup.payment",  compact('topupID', 'snapToken'));
    }

    public function callback(Request $request) {
        // $server_key = config('midtrans.server_key');
        // $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$server_key);

        // if ($hashed == $request->signature_key) {
        //     if ($request->transaction_status == 'capture') {
        //         $topup = TopUp::find($request->oder_id);
        //         $topup->update(['topup_status' => 'Paid']);
        //     }
        // }
    }

    public function exportPDF()
    {
        $saveName = 'Laporan TopUp ' . date('y-m-d') . '.pdf';
        $user_id = auth()->id();
        $laporan = TopUp::get()->where('dompet_id', $user_id);
        $pdf = PDF::loadview('user.topup.laporanPDF', compact('laporan'));

        return $pdf->download($saveName);
    }
}
