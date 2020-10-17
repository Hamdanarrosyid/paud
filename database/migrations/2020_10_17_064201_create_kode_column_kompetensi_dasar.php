<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodeColumnKompetensiDasar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kompetensi_dasar', function (Blueprint $table) {
            $table->string('kode')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('kompetensi_dasar', 'kode'))
        {
            Schema::table('kompetensi_dasar', function (Blueprint $table)
            {
                $table->dropColumn('kode');
            });
        }
    }
}
