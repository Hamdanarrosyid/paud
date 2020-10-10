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
            $table->unsignedBigInteger('sub_tema_id');
            $table->foreign('sub_tema_id')->references('id')->on('sub_tema');
            $table->string('kd');
            $table->string('muatan_belajar');
            $table->string('rencana_kegiatan');
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
