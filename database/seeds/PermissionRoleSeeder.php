<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['role_id'=>1,'permissions_id'=>13],
            ['role_id'=>1,'permissions_id'=>14],
            ['role_id'=>1,'permissions_id'=>15],
            ['role_id'=>1,'permissions_id'=>16],
            ['role_id'=>1,'permissions_id'=>21],
            ['role_id'=>1,'permissions_id'=>22],
            ['role_id'=>1,'permissions_id'=>23],
            ['role_id'=>1,'permissions_id'=>24],
        ];
        DB::table('permissions_role')->insert($data);
        DB::table('role_user')->insert([
            'role_id'=>1,
            'user_id'=>1,
        ]);
    }
}
