<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
