<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Administrator')->first();
        $operatorRole = Role::where('name', 'Operator')->first();
        $touristRole = Role::where('name', 'Tourist / User')->first();

        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role_id' => $adminRole?->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'operator@example.com'],
            [
                'name' => 'Operator User',
                'password' => Hash::make('password'),
                'role_id' => $operatorRole?->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'tourist@example.com'],
            [
                'name' => 'Tourist User',
                'password' => Hash::make('password'),
                'role_id' => $touristRole?->id,
            ]
        );
    }
}