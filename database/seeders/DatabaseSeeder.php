<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder; // pastikan ini ada jika perlu
use Database\Seeders\UserSeeder; // pastikan ini ada jika perlu

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProductSeeder::class,
            UserSeeder::class,

        ]);
    }
}
