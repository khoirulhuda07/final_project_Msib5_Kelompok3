<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akun';
    protected $fillable = ['fullname', 'username', 'email', 'password', 'level', 'alamat', 'dompet_id'] ;

    public function pengiriman() {
        return $this->hasMany(Pengiriman::class);
    }

    public function dompet() {
        return $this->belongsTo(Dompet::class);
    }

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class);
    }
}
