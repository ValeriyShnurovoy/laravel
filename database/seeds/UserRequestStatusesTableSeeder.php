<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRequestStatusesTableSeeder extends Seeder
{
    private $requestStatuses = [
        'new',
        'approved',
        'rejected',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->requestStatuses as $requestStatus) {
            DB::table('user_request_statuses')->insert([
                'status' => $requestStatus,
            ]);
        }
    }
}
