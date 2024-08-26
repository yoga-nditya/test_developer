<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'kredit_id',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'metode_pembayaran',
    ];
}
