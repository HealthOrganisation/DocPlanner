<?php

namespace Database\Seeders;
use App\Models\Patient;

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'id_user' => 2, // Assurez-vous que l'id_user existe dans la table users
            'nom' => 'www',
            'date_naissance' => '2003-10-09',
            'poids' => 60,
            'taille' => 160,
        ]);
    }
}
