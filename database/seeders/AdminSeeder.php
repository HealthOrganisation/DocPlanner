<?php

namespace Database\Seeders;
use App\Models\Admin;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([

            'nom'=> 'khalil',
            'email'=> 'khalil@gmail.com',
            'password'=> bcrypt('khalillll'),
            'role'=> 'test',
            ]);
    }
}
