<?php

namespace Database\Seeders;

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
        DB::table('permission_role')->insert([
            ['permisison_id' => 1, 'role_id' => 1],
            ['permisison_id' => 2, 'role_id' => 1],
            ['permisison_id' => 3, 'role_id' => 1],
            ['permisison_id' => 4, 'role_id' => 1],
            ['permisison_id' => 5, 'role_id' => 1],
        ]);
    }
}
