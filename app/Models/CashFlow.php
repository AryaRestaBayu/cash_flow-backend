<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_transaksi',
        'nominal',
        'tanggal',
        'alasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

