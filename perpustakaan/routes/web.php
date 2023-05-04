<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
// Admin
Route::get('/dashboard-admin', [AdminController::class, 'dashboard']);
// Kategori
Route::get('/admin-kategori', [AdminController::class, 'kategori']);
Route::get('/admin-kategori-add', [AdminController::class, 'kategori_add']);
Route::get('/admin-kategori-edit', [AdminController::class, 'kategori_edit']);

// Buku
Route::get('/admin-buku', [AdminController::class, 'buku']);
Route::get('/admin-buku-add', [AdminController::class, 'buku_add']);
Route::get('/admin-buku-edit', [AdminController::class, 'buku_edit']);

// Registrasi
Route::get('/admin-register', [AdminController::class, 'register']);
Route::get('/admin-register-add', [AdminController::class, 'register_add']);
Route::get('/admin-register-edit', [AdminController::class, 'register_edit']);

// Laporan
Route::get('/admin-laporan-peminjaman', [AdminController::class, 'laporan_peminjaman']);
Route::get('/admin-laporan-pengembalian', [AdminController::class, 'laporan_pengembalian']);

// Transaksi
Route::get('/admin-peminjaman', [AdminController::class, 'peminjaman']);
Route::get('/admin-pengembalian', [AdminController::class, 'pengembalian']);

// User
Route::get('/dashboard-user', [UserController::class, 'dashboard']);

// Transaksi
Route::get('/user-peminjaman', [UserController::class, 'peminjaman']);
Route::get('/user-pengembalian', [UserController::class, 'pengembalian']);