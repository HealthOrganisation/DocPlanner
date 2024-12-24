<?php

namespace Database\Seeders;
use App\Models\Appointment;

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointment::create([
         
            'id_doctor'=> 1,
            'id_patient'=> 2,
            'id_dispo'=> 1,
            'phone'=> '02255522',
            'email'=> 'w@gmail.com',
            ]);  //
    }
}
