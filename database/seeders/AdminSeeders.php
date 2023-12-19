<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'Marcio',
            'email' => 'marciobastosn@gmail.com',
            'password' => Hash::make('123456')
        ]);

        $user->assignRole('admin');

        $user = User::firstOrCreate([
            'name' => 'Paula Silva',
            'email' => 'eng.paullasilva@gmail.com',
            'password' => Hash::make('#paula#2023')
        ]);

        $user->assignRole('admin');
    }
}
