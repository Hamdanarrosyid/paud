<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemaKompetensiDasar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_kompetensi_dasar', function (Blueprint $table) {
            $table->unsignedBigInteger('tema_id');
            $table->unsignedBigInteger('kompetensi_dasar_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tema_kompetensi_dasar');
    }
}
