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
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id_petugas');
            $table->char('nama_petugas');
            $table->char('email');
            $table->char('password');
            $table->char('alamat');
            $table->unsignedInteger('profil_id')->unique();
            $table->timestamps();
        });
        Schema::table('petugas', function (Blueprint $table) {
            $table->foreign('profil_id')->references('id_profil')->on('profil')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
};
