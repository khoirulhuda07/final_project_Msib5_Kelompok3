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
        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);

        $bayar = $request->saldo;

        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => $bayar
        ]);
        
        $response = $data_request->object();
        
        $topup = new TopUp;
        $topup->topup_no = $external_id;
        $topup->saldo = $bayar;
        $topup->bonus = $request->bonus;
        $topup->dompet_id = $request->dompet_id;
        $topup->topup_status = $response->status;
        $topup->topup_link = $response->invoice_url;
        $topup->waktu = $request->waktu;
        $topup->save();
        
        return redirect()->route('my.dompetku');
    }

    public function callback()
    {
        // $data = request()->all();

        // dd($data);

        // $status = $data['status'];
        // $external_id = $data['external_id'];

        // TopUp::where('topup_no', $external_id)->update([
        //     'payment_status' => $status
        // ]);

        // return response()->json($data);
    }

    public function exportPDF(string $id)
    {
        $saveName = 'Laporan TopUp ' . date('y-m-d') . '.pdf';
        $laporan = TopUp::get()->where('dompet_id', $id);
        $pdf = PDF::loadview('user.topup.laporanPDF', compact('laporan'));

        return $pdf->download($saveName);
    }
}
