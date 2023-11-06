<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $fillable = ['metode', 'harga_total', 'keterangan', 'pengiriman_id', 'akun_id'] ;

    public function pengiriman() {
        return $this->hasOne(Pengiriman::class) ;
    }

    public function akun() {
        return $this->hasOne(Akun::class) ;
    }
}
