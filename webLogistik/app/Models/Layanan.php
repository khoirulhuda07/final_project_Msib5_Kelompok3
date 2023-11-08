<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    protected $fillable = ['nama_layanan', 'biaya'] ;
    public $timestamps = false;
    public function pengiriman() {
        return $this->hasMany(Pengiriman::class, 'layanan_id');
    }
}
