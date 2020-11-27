<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRppmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rppm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kompetensi_dasar_id');
            $table->foreign('kompetensi_dasar_id')->references('id')->on('kompetensi_dasar');
            $table->text('muatan_belajar');
            $table->text('rencana_kegiatan');
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
        Schema::dropIfExists('rppm');
    }
}
