<?php

namespace Database\Seeders;

use App\Models\PermissionsAndRoles\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@bjitgroup.com',
                'password' => Hash::make('Bjit12345'),
            ],
            [
                'name' => 'User',
                'email' => 'user@bjitgroup.com',
                'password' => Hash::make('Bjit12345'),
            ]
        ];

        foreach ($users as $userKey => $userRow) {
            $user = User::create($userRow);
            $user->roles()->attach([$userKey + 1]);
        }

    }
}
