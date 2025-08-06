<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'anrosarg@gmail.com'],
            [
                'name' => 'Antonio Narvaez',
                'password' => Hash::make('6486036'),
                'email_verified_at' => now(),
            ]
        );
    }
}