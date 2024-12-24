<?php

namespace Database\Seeders;
use App\Models\Doctor;

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'id_user' => 1,
            'nom' => 'Khadija',
            'specialite' => 'Dermato',
            'location' => 'Tanger',
            'phone' => '061205556',
            'date_debut' => '2012-02-01',
            'image' => 'image.png',
            'availabilityStatus' => 'dispo',
        ]);
    }
}
