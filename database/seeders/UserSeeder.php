<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
        ]);

        $dataEntry = User::create([
            'name' => 'Data Entry User',
            'email' => 'dataentry@email.com',
            'password' => Hash::make('dataentry'),
        ]);

        $admin->assignRole('Administrator');
        $dataEntry->assignRole('Data Entry');
    }
}
