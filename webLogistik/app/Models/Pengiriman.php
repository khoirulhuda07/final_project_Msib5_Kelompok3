<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    protected $fillable = ['kode', 'tanggal', 'lokasi_tujuan', 'paket_id', 'layanan_id', 'penerima_id', 'akun_id', 'kurir_id'] ;

    public function paket() {
        return $this->hasOne(paket::class) ;
    }

    public function layanan() {
        return $this->hasOne(Layanan::class) ;
    }

    public function kurir() {
        return $this->hasOne(Kurir::class) ;
    }

    public function akun() {
        return $this->hasOne(Akun::class) ;
    }

    public function penerima() {
        return $this->hasOne(Penerima::class) ;
    }

    public function pembayaran() {
        return $this->hasMany(pembayaran::class) ;
    }
}
