<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin/master/buku');
    }
    public function kategori() {
        return view('admin/master/kategori');
    }
    public function register() {
        return view('admin/master/registrasi');
    }
}