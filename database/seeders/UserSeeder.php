<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::firstOrCreate(
            ['email' => 'admin@restaurant.com'],
            [
                'name' => 'Restaurant Admin',
                'email' => 'admin@restaurant.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Default admin user created:');
        $this->command->info('Email: admin@restaurant.com');
        $this->command->info('Password: password123');
    }
}
