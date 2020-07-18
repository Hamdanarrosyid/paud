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
                ['role_id' => 1, 'permissions_id' => 1],
                ['role_id' => 1, 'permissions_id' => 2],
                ['role_id' => 1, 'permissions_id' => 3],
                ['role_id' => 1, 'permissions_id' => 4],
                ['role_id' => 1, 'permissions_id' => 5],
                ['role_id' => 1, 'permissions_id' => 6],
                ['role_id' => 1, 'permissions_id' => 7],
                ['role_id' => 1, 'permissions_id' => 8],
                ['role_id' => 1, 'permissions_id' => 9],
                ['role_id' => 1, 'permissions_id' => 10],
                ['role_id' => 1, 'permissions_id' => 11],
                ['role_id' => 1, 'permissions_id' => 12],
                ['role_id' => 1, 'permissions_id' => 13],
                ['role_id' => 1, 'permissions_id' => 14],
                ['role_id' => 1, 'permissions_id' => 15],
                ['role_id' => 1, 'permissions_id' => 16],
                ['role_id' => 1, 'permissions_id' => 17],
                ['role_id' => 1, 'permissions_id' => 18],
                ['role_id' => 1, 'permissions_id' => 19],
                ['role_id' => 1, 'permissions_id' => 20],
                ['role_id' => 1, 'permissions_id' => 21],
                ['role_id' => 1, 'permissions_id' => 22],
                ['role_id' => 1, 'permissions_id' => 23],
                ['role_id' => 1, 'permissions_id' => 24],
                ['role_id' => 1, 'permissions_id' => 25],
                ['role_id' => 1, 'permissions_id' => 26],
                ['role_id' => 1, 'permissions_id' => 27],
                ['role_id' => 1, 'permissions_id' => 28],
                ['role_id' => 2, 'permissions_id' => 1],
                ['role_id' => 2, 'permissions_id' => 5],
                ['role_id' => 2, 'permissions_id' => 9],
                ['role_id' => 2, 'permissions_id' => 17],
            ];
        DB::table('permissions_role')->insert($data);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }
}
