<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $fillable = ['berat', 'deskripsi'] ;
    public $timestamps = false;

    public function pengiriman() {
        return $this->hasOne(Pengiriman::class, 'paket_id');
    }
}
