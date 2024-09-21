<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable // Pastikan ini mewarisi dari Authenticatable
{
    use Notifiable;

    protected $table = 'accounts'; // Tentukan tabel yang digunakan

    protected $fillable = [
        'nama',
        'username',
        'password',
        'alamat',
        'jenis_kelamin',
        'no_hp',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
