<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaPeminjam extends Model
{
    use HasFactory;
    protected $table = "tb_nama_peminjam";
    protected $primaryKey = "id_np";
    protected $fillable = [
        'nim',
        'nama_peminjam', 
        'no_hp',
        'alamat',
        'fakultas',
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjamam::class);
    }
}