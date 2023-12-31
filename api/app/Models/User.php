<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'alamat',
        'role',
        'foto',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
