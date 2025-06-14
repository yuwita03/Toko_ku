<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder; // pastikan ini ada jika perlu

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
