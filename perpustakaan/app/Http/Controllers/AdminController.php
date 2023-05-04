<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin/dashboard');
    }
    public function laporan_peminjaman() {
        return view('admin/laporan/peminjaman');
    }
    public function laporan_pengembalian() {
        return view('admin/laporan/pengembalian');
    }
    public function buku() {
        $buku = DB::table('bukus')->join('kategori', 'kategori.kode_kategori', '=', 'buku.kategori_kode')->get();
        return view('admin/master/buku',['buku' => $buku]);
    }
    public function buku_add() {
        $positions = Buku::all();
        $buku = DB::table('bukus')->select(DB::raw('MAX(RIGHT(kode_buku,4)) as kode'));
        $kd = "";
        if($buku->count()>0){
            foreach($buku->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        }else{
            $kd = "0001";
        }
        return view('admin/master/form/buku', compact('positions','buku','kd'));
    }
    public function kategori() {
        
        $kategori2 = DB::table('kategoris')->get();
        return view('admin/master/kategori')->with('kategori', $kategori2);
        
    }
    public function kategori_add() {
        $positions = Buku::all();
        $kategori = DB::table('kategoris')->select(DB::raw('MAX(RIGHT(kode_kategori,4)) as kode'));
        $kd = "";
        if($kategori->count()>0){
            foreach($kategori->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        }else{
            $kd = "0001";
        }
        return view('admin/master/form/kategori', compact('kategori','kd'));
    }
    public function register() {
        return view('admin/master/registrasi');
    }
    public function peminjaman() {
        return view('admin/transaksi/peminjaman');
    }
    public function pengembalian() {
        return view('admin/transaksi/pengembalian');
    }
}