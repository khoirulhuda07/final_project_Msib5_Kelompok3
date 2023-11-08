<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    public $timestamps = false;

    protected $fillable = ['kode', 'tanggal', 'lokasi_tujuan', 'paket_id', 'layanan_id', 'penerima_id', 'akun_id', 'kurir_id'] ;

    public function paket() {
        return $this->belongsTo(paket::class) ;
    }

    public function layanan() {
        return $this->belongsTo(Layanan::class) ;
    }

    public function kurir() {
        return $this->belongsTo(Kurir::class) ;
    }

    public function akun() {
        return $this->belongsTo(Akun::class) ;
    }

    public function penerima() {
        return $this->belongsTo(Penerima::class) ;
    }

    public function pembayaran() {
        return $this->hasMany(pembayaran::class) ;
    }
}
