<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{

    private $locations = [
        'Dnepr',
        'Kiev',
        'Kharkiv',
        'Lviv',
        'Odessa',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->locations as $location) {
            DB::table('locations')->insert([
                'location' => $location,
            ]);
        }
    }
}
