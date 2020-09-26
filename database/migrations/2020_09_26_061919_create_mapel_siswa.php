<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('siswa_id');
            $table->timestamps();
        });

//        Schema::table('mapel_siswa',function (Blueprint $table){
//            $table->foreign('mapel_id')->references('id')->on('mapel');
//            $table->foreign('siswa_id')->references('id')->on('siswa');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel_siswa');
    }
}
