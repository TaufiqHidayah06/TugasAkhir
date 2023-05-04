<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->char('kode_peminjaman',50)->primary();
            $table->char('user_kode',50)->unique();
            $table->char('buku_kode',50)->unique();
            $table->char('tgl_pinjam',50);
            $table->char('tgl_kembali',50);
            $table->enum('status', ['Belum Kembali', 'Sudah Kembali']);
            $table->timestamps();
        });
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->foreign('user_kode')->references('kode_user')->on('user')->onDelete('cascade');
            $table->foreign('buku_kode')->references('kode_buku')->on('buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
};