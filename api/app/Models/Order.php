<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
        'nama',
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk', 'produk_id');
    }
}
