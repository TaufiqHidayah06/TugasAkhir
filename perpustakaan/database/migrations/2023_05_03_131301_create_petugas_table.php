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
        Schema::create('petugass', function (Blueprint $table) {
            $table->char('kode_petugas',50)->primary();
            $table->char('email',50);
            $table->char('password',50);
            $table->char('alamat', 50);
            $table->char('profil_kode',50)->unique();
            $table->timestamps();
        });
        Schema::table('petugas', function (Blueprint $table) {
            $table->foreign('profil_kode')->references('kode_profil')->on('profil')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugass');
    }
};