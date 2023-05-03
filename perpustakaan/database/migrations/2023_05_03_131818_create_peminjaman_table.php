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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id_pinjam');
            $table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('buku_id')->unique();
            $table->char('tgl_pinjam');
            $table->char('tgl_kembali');
            $table->enum('status', ['Belum Kembali', 'Sudah Kembali']);
            $table->timestamps();
        });
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('user_id')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('buku_id')->references('id_buku')->on('buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
