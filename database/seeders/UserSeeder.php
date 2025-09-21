<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Fetch the SuperAdmin role_id
        $superAdmin_role = DB::table('roles')->where("role_name", "SuperAdmin")->first();

        //Insert the SuperAdmin Record
        DB::table("users")->insert(["name" => "Super Admin", "email" => "superadmin@gmail.com", "role_id" => $superAdmin_role->id, "password" => bcrypt('superAdmin@123'), "created_at" => date('Y-m-d H:i:s')]);
    }
}
