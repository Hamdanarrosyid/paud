<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramSemester extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_semester', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->unsignedBigInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('tema');
//            $table->unsignedBigInteger('sub_tema_id');
//            $table->foreign('sub_tema_id')->references('id')->on('sub_tema');
//            $table->unsignedBigInteger('kompetensi_dasar_id');
//            $table->foreign('kompetensi_dasar_id')->references('id')->on('kompetensi_dasar');
            $table->unsignedBigInteger('bulan_id');
            $table->foreign('bulan_id')->references('id')->on('bulan');
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
        Schema::dropIfExists('program_semester');
    }
}
