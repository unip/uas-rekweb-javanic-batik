<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'produk';
    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'kode_produk',
        'deskripsi_produk',
        'foto',
        'qty',
        'satuan',
        'harga',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }

    // public function photo()
    // {
    //     return $this->hasMany(ProdukImage::class);
    // }
    // public function promo()
    // {
    //     return $this->hasOne('App\Models\ProdukPromo', 'produk_id');
    // }
}
