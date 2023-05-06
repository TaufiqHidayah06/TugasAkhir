<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    protected $table = "tb_peminjaman";
    protected $primaryKey = "peminjaman_id";
    protected $fillable = [
        'kode_peminjaman',
        'nip', 
        'buku_kode',
        'nim',
        'tgl_pinjam',
        'tgl_kembali',
        'status',
    ];
    public function buku()
    {
        return $this->belongsToMany(Buku::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function namapeminjam()
    {
        return $this->hasMany(NamaPeminjam::class);
    }
}