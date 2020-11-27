<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tema', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->unsignedBigInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('tema');
            $table->string('sub_tema');
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
        Schema::dropIfExists('sub_tema');
    }
}