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
Route::get('/dashboard-admin', [AdminController::class, 'dashboard']);
Route::get('/admin-kategori', [AdminController::class, 'kategori']);
Route::get('/admin-buku', [AdminController::class, 'buku']);
Route::get('/admin-register', [AdminController::class, 'register']);
Route::get('/admin-laporan-peminjaman', [AdminController::class, 'laporan_peminjaman']);
Route::get('/admin-laporan-pengembalian', [AdminController::class, 'laporan_pengembalian']);
Route::get('/dashboard-user', [UserController::class, 'dashboard']);