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
                'image' => 'https://png.pngtree.com/png-clipart/20231021/original/pngtree-watercolor-brownie-chocolate-png-image_13391742.png',
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
                'image' => 'https://th.bing.com/th/id/OIP.TOGfGDGu4-Ct6vpKBMY1vAHaHa?w=179&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
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
                'image' => 'https://static.vecteezy.com/system/resources/previews/054/809/640/large_2x/tiramisu-slice-isolated-on-transparent-background-png.png',
                'description' => 'Potongan kue tiramisu dengan lapisan krim dan kopi.',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);

    }
}
