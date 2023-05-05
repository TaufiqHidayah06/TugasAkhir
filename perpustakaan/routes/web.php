<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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
    return view('home');});

// Login
Route::get('/login-perpus', [LoginController::class, 'login_perpus'])->name('login');
Route::post('/login-perpus', [LoginController::class, 'actionlogin']);

// Admin
Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])->middleware('auth');

// Kategori
Route::get('/admin-kategori', [AdminController::class, 'kategori'])->middleware('auth');
Route::get('/admin-kategori-add', [AdminController::class, 'kategori_add'])->middleware('auth');
Route::post('/admin-kategori-save',[AdminController::class, 'kategori_save']);
Route::get('/admin-kategori-edit/{id}', [AdminController::class, 'kategori_edit'])->middleware('auth');
Route::post('/admin-kategori-update',[AdminController::class, 'kategori_update']);
Route::get('/admin-kategori-delete/{id}',[AdminController::class, 'kategori_delete']);

// Buku
Route::get('/admin-buku', [AdminController::class, 'buku'])->middleware('auth');
Route::get('/admin-buku-add', [AdminController::class, 'buku_add'])->middleware('auth');
Route::get('/admin-buku-edit', [AdminController::class, 'buku_edit'])->middleware('auth');

// Registrasi
Route::get('/admin-register', [AdminController::class, 'register'])->middleware('auth');
Route::get('/admin-register-add', [AdminController::class, 'register_add'])->middleware('auth');
Route::get('/admin-register-edit', [AdminController::class, 'register_edit'])->middleware('auth');

// Laporan
Route::get('/admin-laporan-peminjaman', [AdminController::class, 'laporan_peminjaman'])->middleware('auth');
Route::get('/admin-laporan-pengembalian', [AdminController::class, 'laporan_pengembalian'])->middleware('auth');

// Transaksi
Route::get('/admin-peminjaman', [AdminController::class, 'peminjaman'])->middleware('auth');
Route::get('/admin-pengembalian', [AdminController::class, 'pengembalian'])->middleware('auth');

// User
Route::get('/dashboard-user', [UserController::class, 'dashboard'])->middleware('auth');

// Transaksi
Route::get('/user-peminjaman', [UserController::class, 'peminjaman'])->middleware('auth');
Route::get('/user-pengembalian', [UserController::class, 'pengembalian'])->middleware('auth');