<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "tb_karyawan";
    protected $primaryKey = "id";
    protected $fillable = [
        'nip',
        'nama', 
        'alamat',
        'status',
        'no_hp',
        'batas_pinjam',
    ];
    public function user()
    {
    	return $this->hasOne('App\Models\User');
    }
}