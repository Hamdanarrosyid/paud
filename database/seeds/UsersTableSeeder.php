<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('AdmenPaud123321'),
            'role_id' => 1
        ]);
    }
}
