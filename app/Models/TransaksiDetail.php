<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksis_id',
        'products_id',
        'harga',
        'resi',
        'status_transaksi',
        'code'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id', 'transaksis_id');
    }
}
