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
    return view('home');});

// Login
Route::get('login-perpus', [UserController::class, 'login'])->name('login');
Route::post('login-perpus', [UserController::class, 'login_action'])->name('login.action');
// Logout
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// Admin
Route::get('dashboard-admin', [AdminController::class, 'dashboard'])->name('admin')->middleware('auth');

// Kategori
Route::get('admin-kategori', [AdminController::class, 'kategori'])->name('kategori')->middleware('auth');
Route::get('admin-kategori-add', [AdminController::class, 'kategori_add'])->name('addkategori')->middleware('auth');
Route::post('admin-kategori-save',[AdminController::class, 'kategori_save'])->middleware('auth');
Route::get('admin-kategori-edit/{id}', [AdminController::class, 'kategori_edit'])->name('editkategori')->middleware('auth');
Route::post('admin-kategori-update',[AdminController::class, 'kategori_update'])->middleware('auth');
Route::get('admin-kategori-delete/{id}',[AdminController::class, 'kategori_delete'])->middleware('auth');

// Buku
Route::get('admin-buku', [AdminController::class, 'buku'])->name('buku')->middleware('auth');
Route::get('admin-buku-add', [AdminController::class, 'buku_add'])->name('addbuku')->middleware('auth');
Route::post('admin-buku-save',[AdminController::class, 'buku_save'])->middleware('auth');
Route::get('admin-buku-edit/{id}', [AdminController::class, 'buku_edit'])->name('editbuku')->middleware('auth');
Route::post('admin-buku-update',[AdminController::class, 'buku_update'])->middleware('auth');
Route::get('admin-buku-delete/{id}',[AdminController::class, 'buku_delete'])->middleware('auth');

// Registrasi
Route::get('admin-register', [AdminController::class, 'register'])->name('register')->middleware('auth');
Route::get('admin-register-add', [AdminController::class, 'register_add'])->name('addregister')->middleware('auth');
Route::post('admin-register-save',[AdminController::class, 'register_save'])->middleware('auth');
Route::get('admin-register-edit/{id}', [AdminController::class, 'register_edit'])->name('editregister')->middleware('auth');
Route::post('admin-register-update',[AdminController::class, 'register_update'])->middleware('auth');
Route::get('admin-register-delete/{id}',[AdminController::class, 'register_delete'])->middleware('auth');

// Laporan
Route::get('admin-laporan-peminjaman', [AdminController::class, 'laporan_peminjaman'])->middleware('auth');
Route::get('admin-laporan-pengembalian', [AdminController::class, 'laporan_pengembalian'])->middleware('auth');

// Transaksi
Route::get('admin-peminjaman', [AdminController::class, 'peminjaman'])->name('peminjaman')->middleware('auth');
Route::get('admin-peminjaman-add/{id}', [AdminController::class, 'form_peminjaman'])->name('aksipinjam')->middleware('auth');
Route::post('admin-peminjaman-pinjam', [AdminController::class, 'proses_peminjaman'])->name('pinjam')->middleware('auth');

Route::get('admin-pengembalian', [AdminController::class, 'pengembalian'])->name('pengembalian')->middleware('auth');
Route::get('admin-pengembalian-edit/{$id}', [AdminController::class, 'edit_pengembalian']);
Route::post('admin-pengembalian-update',[AdminController::class, 'update_pengembalian'])->name('updatepengembalian')->middleware('auth');