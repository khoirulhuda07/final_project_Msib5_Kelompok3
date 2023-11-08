<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    use HasFactory;

    protected $table = 'kurir';
    protected $fillable = ['nama_kurir', 'nomor_telepon', 'jadwal'] ;
    public $timestamps = false;
    public function pengiriman() {
        return $this->hasMany(Pengiriman::class, 'kurir_id');
    }
}
