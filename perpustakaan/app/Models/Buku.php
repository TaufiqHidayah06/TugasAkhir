<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    protected $fillable = [
        'position_name',
    ];

    public function buku()
    {

        return $this->hasMany(buku::class);
    }
}