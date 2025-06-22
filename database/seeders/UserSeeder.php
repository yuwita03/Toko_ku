<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        {
User::create([
    'nama' => 'Administrator',
    'email' => 'admin@gmail.com',
    'role' => '1',
    'status' => 1,
    'hp' => '0812345678901',
    'alamat' => 'Jl. Admin No. 1',
    'password' => bcrypt('P@55word'),
]);

User::create([
    'nama' => 'SuperAdmin',
    'email' => 'superadmin@gmail.com',
    'role' => '0',
    'status' => 1,
    'hp' => '081234567892',
    'alamat' => 'Jl. Super No. 2',
    'password' => bcrypt('git '),
]);

User::create([
    'nama' => 'User Biasa',
    'email' => 'user@gmail.com',
    'role' => '2',
    'status' => 1,
    'hp' => '081234567893',
    'alamat' => 'Jl. User No. 3',
    'password' => bcrypt('P@55word'),
]);

        }

    }
    }

