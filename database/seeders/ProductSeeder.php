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
                'name' => 'Brownies Coklat',
                'barcode' => '2000001',
                'category' => 'Kue',
                'stock' => 30,
                'sell_price' => 45000,
                'cost_price' => 30000,
                'profit' => 15000,
                'image' => 'https://via.placeholder.com/300x200?text=Brownies+Coklat',
                'description' => 'Brownies coklat lembut dan legit, cocok untuk camilan keluarga.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Cheesecake Stroberi',
                'barcode' => '2000002',
                'category' => 'Cake',
                'stock' => 15,
                'sell_price' => 65000,
                'cost_price' => 45000,
                'profit' => 20000,
                'image' => 'https://via.placeholder.com/300x200?text=Cheesecake+Stroberi',
                'description' => 'Cheesecake dingin dengan topping stroberi segar.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Tiramisu Slice',
                'barcode' => '2000003',
                'category' => 'Dessert',
                'stock' => 25,
                'sell_price' => 50000,
                'cost_price' => 35000,
                'profit' => 15000,
                'image' => 'https://via.placeholder.com/300x200?text=Tiramisu+Slice',
                'description' => 'Potongan kue tiramisu dengan lapisan krim dan kopi.',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);

    }
}
