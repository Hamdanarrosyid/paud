<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['permission'=>'can-view','for'=>'guru'],
            ['permission'=>'can-create','for'=>'guru'],
            ['permission'=>'can-edit','for'=>'guru'],
            ['permission'=>'can-delete','for'=>'guru'],
            ['permission'=>'can-view','for'=>'siswa'],
            ['permission'=>'can-create','for'=>'siswa'],
            ['permission'=>'can-edit','for'=>'siswa'],
            ['permission'=>'can-delete','for'=>'siswa'],
            ['permission'=>'can-view','for'=>'walimurid'],
            ['permission'=>'can-create','for'=>'walimurid'],
            ['permission'=>'can-edit','for'=>'walimurid'],
            ['permission'=>'can-delete','for'=>'walimurid'],
            ['permission'=>'can-view','for'=>'user'],
            ['permission'=>'can-create','for'=>'user'],
            ['permission'=>'can-edit','for'=>'user'],
            ['permission'=>'can-delete','for'=>'user'],
            ['permission'=>'can-view','for'=>'sarana'],
            ['permission'=>'can-create','for'=>'sarana'],
            ['permission'=>'can-edit','for'=>'sarana'],
            ['permission'=>'can-delete','for'=>'sarana'],
            ['permission'=>'can-view','for'=>'prasarana'],
            ['permission'=>'can-create','for'=>'prasarana'],
            ['permission'=>'can-edit','for'=>'prasarana'],
            ['permission'=>'can-delete','for'=>'prasarana'],
            ['permission'=>'can-view','for'=>'jadwal'],
            ['permission'=>'can-create','for'=>'jadwal'],
            ['permission'=>'can-edit','for'=>'jadwal'],
            ['permission'=>'can-delete','for'=>'jadwal'],
        ];
        DB::table('permissions')->insert($permissions);
    }
}
