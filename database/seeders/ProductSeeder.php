<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'name' => 'Kaos Polos',
                'barcode' => '1000001',
                'category' => 'Fashion',
                'stock' => 100,
                'sell_price' => 50000,
                'cost_price' => 35000,
                'profit' => 15000,
                'image' => 'https://via.placeholder.com/300x200?text=Kaos+Polos',
                'description' => 'Kaos polos bahan katun, nyaman dipakai.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Celana Jeans',
                'barcode' => '1000002',
                'category' => 'Fashion',
                'stock' => 50,
                'sell_price' => 120000,
                'cost_price' => 80000,
                'profit' => 40000,
                'image' => 'https://via.placeholder.com/300x200?text=Celana+Jeans',
                'description' => 'Celana jeans biru ukuran all size.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Sepatu Sneakers',
                'barcode' => '1000003',
                'category' => 'Sepatu',
                'stock' => 20,
                'sell_price' => 200000,
                'cost_price' => 150000,
                'profit' => 50000,
                'image' => 'https://via.placeholder.com/300x200?text=Sneakers',
                'description' => 'Sepatu sneakers kekinian, nyaman untuk harian.',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
