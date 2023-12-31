<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'deskripsi_kategori',
        'status',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
