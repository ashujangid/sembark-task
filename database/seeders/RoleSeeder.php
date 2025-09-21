<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([['role_name' => 'SuperAdmin', 'created_at' => date('Y-m-d H:i:s')], ['role_name' => 'Admin', 'created_at' => date('Y-m-d H:i:s')], ['role_name' => 'Member', 'created_at' => date('Y-m-d H:i:s')]]);
    }
}
