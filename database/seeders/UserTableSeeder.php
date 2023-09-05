<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Abdellah',
            'email' => 'Abdellahouchrif15@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2
        ]);
    }
}
