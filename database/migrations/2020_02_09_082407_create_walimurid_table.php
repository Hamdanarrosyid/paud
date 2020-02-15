<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalimuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walimurid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->bigInteger('nohp');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('pekerjaan_id');
            $table->string('alamat');
            $table->timestamps();
        });
        Schema::table('walimurid',function (Blueprint $table){
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
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
        Schema::dropIfExists('walimurid');
    }
}
