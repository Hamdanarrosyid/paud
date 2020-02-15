<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->unsignedBigInteger('tempat_id');
            $table->date('tanggal');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('agama_id');
            $table->string('alamat');
            $table->string('nohp');
            $table->timestamps();
        });
        Schema::table('guru',function (Blueprint $table){
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
        Schema::dropIfExists('guru');
    }
}
