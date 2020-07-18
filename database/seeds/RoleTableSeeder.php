<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'role' => 'admin',
        ]);
        DB::table('role')->insert([
            'role' => 'guru',
        ]);
        DB::table('role')->insert([
            'role' => 'walimurid',
        ]);
    }
}
