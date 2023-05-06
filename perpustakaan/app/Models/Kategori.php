<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "tb_kategori";
    protected $primaryKey = "kategori_id";
    protected $fillable = [
        'kode_kategori',
        'nama_kategori', 
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'kode_kategori', 'kategori_kode');
    }
}