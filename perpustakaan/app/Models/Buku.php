<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;
    
    protected $table = "tb_buku";
    protected $primaryKey = "buku_id";
    protected $fillable = [
        'kode_buku',
        'nama_buku', 
        'penulis',
        'penerbit',
        'kategori_kode',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}