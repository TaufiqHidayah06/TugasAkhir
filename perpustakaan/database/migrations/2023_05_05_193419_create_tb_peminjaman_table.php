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
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->char('kode_peminjaman',50);
            $table->char('nip',50);
            $table->char('buku_kode',50);
            $table->char('nim',50);
            $table->char('tgl_pinjam',50);
            $table->char('tgl_kembali',50);
            $table->enum('status', ['Belum Kembali', 'Sudah Kembali']);
            $table->timestamps();

            $table->foreign('buku_kode')->references('kode_buku')->on('tb_buku')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('tb_nama_peminjam')->onDelete('cascade');
            $table->foreign('nip')->references('nip')->on('tb_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_peminjaman');
    }
};