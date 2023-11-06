<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $table = 'penerima';
    protected $fillable = ['nama', 'nomor_telepon'] ;

    public function pengiriman() {
        return $this->hasMany(Pengiriman::class);
    }
}
