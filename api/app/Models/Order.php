<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'email',
        'no_invoice',
        'phone',
        'status_pembayaran',
        'produk_id',
        'no_resi',
        'ekspedisi',
        'subtotal',
        'ongkir',
        'jumlah_pesanan',
        'total',
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk', 'produk_id');
    }
}
