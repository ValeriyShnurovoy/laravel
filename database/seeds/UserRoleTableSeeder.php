<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    private $userRole = [
        'admin',
        'guest',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->userRole as $userRole) {
            DB::table('user_role')->insert([
                'role' => $userRole,
            ]);
        }
    }
}
