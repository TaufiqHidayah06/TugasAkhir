<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use MaatWebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Peminjaman::select("kode_peminjaman", "nama_buku", "nama_peminjaman","tgl_pinjam","tgl_kembali")->get();
    }
    public function headings(): array
    {
        return ['KODE PEMINJAMAN','NAMA BUKU','NAMA MAHASISWA','TANGGAL PINJAM','TANGGAL KEMBALI'];
    }
}