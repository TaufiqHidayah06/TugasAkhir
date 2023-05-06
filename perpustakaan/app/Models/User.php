<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class user extends Authenticatable
{
    use HasFactory;

    protected $table = "tb_user";
    protected $primaryKey = "user_id";
    protected $fillable = [
        'email',
        'password',
        'nip',
        'nama',
        'alamat',
        'no_hp',
    ];
    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class);
    }
}