<?php

namespace Database\Seeders;

use App\Models\Suppliers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Suppliers::create([
        //     'name' => 'Supplier One',
        //     'contact' => 'supplier1@example.com'
        // ]);

        // Suppliers::create([
        //     'name' => 'Supplier Two',
        //     'contact' => 'supplier2@example.com'
        // ]);

        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'name' => 'Supplier ' . $i,
                'contact' => 'Contact ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('suppliers')->insert($data);
    }
    
}
