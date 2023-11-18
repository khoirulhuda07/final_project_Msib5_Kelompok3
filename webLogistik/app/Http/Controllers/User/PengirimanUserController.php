<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\kurir;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use App\Models\Pengiriman;
use App\Models\Pembayaran;
use App\Models\Dompet;


class PengirimanUserController extends Controller
{
    public function index()
    {
        $pengiriman = pengiriman::all();
        $akun = akun::all();
        $kurir = kurir::all();
        $layanan = layanan::all();
        $pembayaran = pembayaran::all();
        $dompet = dompet::all();
        return view("user.pengirimanUser.index", ['pengiriman' => $pengiriman], compact('dompet', 'pembayaran', 'akun', 'kurir', 'layanan'));
        // $client = new Client();
        // $url = 'http://127.0.0.1:8000/api/pengiriman';
        // $respon = $client->request('GET', $url);
        // $konten = $respon->getBody()->getContents();
        // $dt = json_decode($konten, true);
        // $data = $dt['data'];
        // // print_r($data);
        // return view('user.pengirimanUser.index', ['data' => $data]);
    }
    public function store(request $resquest)
    {
        $resquest->validate(
            [
                'metode' => 'required',
                'harga_total' => 'required',

            ],
            [
                'metode.required' => 'data wajib diisi',
                'harga_total.required' => 'data wajib diisi',
            ]
        );
        $id = $resquest->id;
        $dompet1 = Dompet::find($id);
        $bayar = $resquest->harga_bayar;
        $sisaSaldo = $dompet1->saldo - $bayar;

        $pembayaran = new pembayaran;
        $pembayaran->metode = $resquest->metode;
        $pembayaran->harga_total = $resquest->harga_bayar;
        $pembayaran->keterangan = $resquest->keterangan;
        $pembayaran->pengiriman_id = $resquest->pengiriman_id;
        $pembayaran->akun_id = $resquest->akun_id;
        $pembayaran->save();

        $dompet = dompet::find($id);
        $dompet->saldo = $sisaSaldo;
        $dompet->save();
        return redirect('user/pengirimanUser');
    }

    public function create()
    {
        $pengiriman = pengiriman::all();
        $akun = akun::all();
        $kurir = kurir::all();
        $layanan = layanan::all();
        $pembayaran = pembayaran::all();
        $dompet = dompet::all();
        return view('user.pengirimanUser.tambah', compact('akun', 'kurir', 'layanan', 'pembayaran', 'dompet'));
    }
    public function pul(Request $request)
    {
        $kode = $this->generateUniqueCode();
        $paket = paket::create(
            [
                'berat' => $request->berat,
                'deskripsi' => $request->deskripsi
            ]
        );
        $penerima = penerima::create(
            [
                'nama' => $request->penerima,
                'nomor_telepon' => $request->no_tlp,
            ]
        );
        $pengiriman = pengiriman::create([
            'kode' => $kode,
            'tanggal' => $request->tanggal,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'paket_id' => $paket->id,
            'layanan_id' => $request->layanan,
            'penerima_id' => $penerima->id,
            'akun_id' => $request->akun,
            'kurir_id' => $request->kurir,

        ]);
        return redirect('user/pengirimanUser');
    }
    private function generateUniqueCode()
    {
        do {
            $kode = Str::random(10);
        } while (Pengiriman::where('kode', $kode)->exists());

        return $kode;
    }
}
