<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard() {
        return view('user/dashboard');
    }
    public function peminjaman() {
        return view('user/transaksi/peminjaman');
    }
    public function pengembalian() {
        return view('user/transaksi/pengembalian');
    }
}