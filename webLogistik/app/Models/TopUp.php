<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    use HasFactory;

    protected $table = 'topup';
    public $timestamps = false;

    protected $fillable = ['saldo', 'bonus', 'waktu', 'dompet_id'];
    public function akun()
    {
        return $this->hasOne(User::class);
    }
}
