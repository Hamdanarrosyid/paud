<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BulanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bulan')->insert([
            ['bulan' => 'Januari'],
            ['bulan' => 'Februari'],
            ['bulan' => 'Maret'],
            ['bulan' => 'April'],
            ['bulan' => 'Mei'],
            ['bulan' => 'Juni'],
            ['bulan' => 'Juli'],
            ['bulan' => 'Agustus'],
            ['bulan' => 'September'],
            ['bulan' => 'Oktober'],
            ['bulan' => 'November'],
            ['bulan' => 'Desember'],
        ]);
    }
}
