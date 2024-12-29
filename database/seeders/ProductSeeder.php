<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // DB::table('products')->insert([
        //     [
        //         'name' => 'Product 1',
        //         'price' => 100.00,
        //         'stock' => 10
        //     ],
        //     [
        //         'name' => 'Product 2',
        //         'price' => 150.50,
        //         'stock' => 20
        //     ],
        //     [
        //         'name' => 'Product 3',
        //         'price' => 200.75,
        //         'stock' => 30
        //     ],
        //     [
        //         'name' => 'Product 4',
        //         'price' => 50.00,
        //         'stock' => 40
        //     ],
        //     [
        //         'name' => 'Product 5',
        //         'price' => 120.99,
        //         'stock' => 15
        //     ],
        // ]);

        $products = [];

        for ($i = 1; $i <= 100; $i++) {
            $products[] = [
                'name' => 'Product ' . $i,
                'price' => rand(1000, 10000) / 100, // Harga antara 10.00 - 100.00
                'stock' => rand(1, 500), // Stok antara 1 - 500
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }

}
