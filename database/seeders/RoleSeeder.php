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
        $roles = [
            ['position' => 'client'],
            ['position' => 'admin'],
            ['position' => 'content_writer'],
            ['position' => 'graphic_designer'],
            ['position' => 'top_manager'],
        ];

        DB::table('roles')->insert($roles);
    }
}
