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
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('tempat_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nohp')->nullable();
            $table->timestamps();
        });
        Schema::table('guru',function (Blueprint $table){
            $table->foreign('tempat_id')->references('id')->on('kota');
            $table->foreign('gender_id')->references('id')->on('jenis_kelamin');
            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('user_id')->references('id')->on('users');
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
