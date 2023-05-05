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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->char('nip',50)->primary();
            $table->char('email',50);
            $table->char('login_kode',50)->unique();
            $table->timestamps();
        });
        Schema::table('karyawans', function (Blueprint $table) {
            $table->foreign('login_kode')->references('kode_login')->on('logins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
};