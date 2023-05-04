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
        Schema::create('bukus', function (Blueprint $table) {
            $table->char('kode_buku',50)->primary();
            $table->char('nama_buku',50);
            $table->char('penulis',50);
            $table->char('penerbit',50);
            $table->char('kategori_kode',50)->unique();
            $table->timestamps();
        });
        Schema::table('bukus', function (Blueprint $table) {
            $table->foreign('kategori_kode')->references('kode_kategori')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};