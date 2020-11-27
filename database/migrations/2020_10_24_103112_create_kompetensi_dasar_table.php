<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKompetensiDasarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetensi_dasar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('kompetensi_dasar');
//            $table->unsignedBigInteger('sub_tema_id');
//            $table->foreign('sub_tema_id')->references('id')->on('sub_tema');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kompetensi_dasar');
    }
}
