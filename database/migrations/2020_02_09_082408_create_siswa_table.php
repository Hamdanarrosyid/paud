<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->unsignedBigInteger('walimurid_id');
            $table->unsignedBigInteger('tempat_id');
            $table->date('tanggal');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('agama_id');
            $table->timestamps();
        });
        Schema::table('siswa',function (Blueprint $table){
            $table->foreign('walimurid_id')->references('id')->on('walimurid');
            $table->foreign('tempat_id')->references('id')->on('kota');
            $table->foreign('gender_id')->references('id')->on('jenis_kelamin');
            $table->foreign('agama_id')->references('id')->on('agama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
