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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->char('nama_user');
            $table->char('prodi');
            $table->char('alamat');
            $table->char('email');
            $table->char('password');
            $table->unsignedInteger('profil_id')->unique();
            $table->timestamps();
        });
        Schema::table('user', function (Blueprint $table) {
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
        Schema::dropIfExists('user');
    }
};
