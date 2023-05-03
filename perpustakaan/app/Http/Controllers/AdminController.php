<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        
        return view('admin/dashboard');
    }

    public function index(){

        // mengambil semua data user
        $user=User::all();

        // mengambil semua data kategori
        $kategori=Kategori::all();

        // mengambil semua data 
        $peminjaman = Peminjaman::all();


        // bikin viewnya untuk menampilkan semua data user
    }
        
}