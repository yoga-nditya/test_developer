<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;

    protected $table = 'marketings';

    protected $fillable = [
        'name',
    ];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'marketing_id');
    }
}
