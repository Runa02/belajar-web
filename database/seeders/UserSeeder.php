<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Runa',
            'email' => 'runa@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'user',
        ]);
    }
}
