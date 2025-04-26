<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@rental.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // User
        User::create([
            'name' => 'John Doe',
            'email' => 'user@rental.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
    }
}
