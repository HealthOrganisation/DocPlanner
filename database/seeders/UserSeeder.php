<?php

namespace Database\Seeders;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'alami',
            'email' => 'w@gmail.com',
            'password' => bcrypt('5255'),
            'role' => 'patient', // Définir un rôle lors de la création
        ]);
    }
}
