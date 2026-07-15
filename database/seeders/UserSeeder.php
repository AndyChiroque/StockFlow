<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Usuarios Predeterminados
         User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'mid@test.com',
            'password' => 'password',
            'role' => 'mid',
        ]);

        User::create([
            'name' => 'Visitante',
            'email' => 'low@test.com',
            'password' => 'password',
            'role' => 'low',
        ]);
    }
}
