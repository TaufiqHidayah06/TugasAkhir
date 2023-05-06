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
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->id('buku_id');
            $table->char('kode_buku',50)->unique();
            $table->char('nama_buku',50);
            $table->char('penulis',50);
            $table->char('penerbit',50);
            $table->char('kategori_kode',50);
            $table->timestamps();

            $table->foreign('kategori_kode')->references('kode_kategori')->on('tb_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_buku');
    }
};