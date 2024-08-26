<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi penamaan Laravel
    protected $table = 'kredits';
    public $timestamps = false;

    // Atribut yang dapat diisi massal
    protected $fillable = [
        'penjualan_id',
        'marketing_id',
        'cicilan',
        'jatuh_tempo',
        'jumlah_yang_harus_dibayar',
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function marketing()
    {
        return $this->belongsTo(Marketing::class);
    }
}
