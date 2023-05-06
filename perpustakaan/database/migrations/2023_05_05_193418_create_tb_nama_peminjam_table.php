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
        Schema::create('tb_nama_peminjam', function (Blueprint $table) {
            $table->id('id_np');
            $table->char('nim',50)->unique();
            $table->char('nama_peminjam',50);
            $table->char('no_hp',50);
            $table->char('alamat',50);
            $table->char('fakultas',50);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_nama_peminjam');
    }
};