<?php

namespace Database\Seeders;
use App\Models\Availability;

use Illuminate\Database\Seeder;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Availability::create([

            'id_doctor' => 1,
            'date' => '2024-01-01', 
            'start_time' => '08:00:00', 
            'end_time' => '16:00:00',
            'is_available' => true, 
        ]);
    }
}
