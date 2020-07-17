<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode','10')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('tahunajaran_id');
            $table->unsignedBigInteger('kelas_id');
            $table->string('keterangan');
            $table->timestamps();
        });
        Schema::table('mapel',function (Blueprint $table){
            $table->foreign('tahunajaran_id')->references('id')->on('tahunajaran');
            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel');
    }
}
