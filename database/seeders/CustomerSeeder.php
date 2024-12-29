<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Customers::create([
        //     'name' => 'John Doe',
        //     'email' => 'john.doe@example.com',
        //     'phone' => '1234567890'
        // ]);

        // Customers::create([
        //     'name' => 'Jane Smith',
        //     'email' => 'jane.smith@example.com',
        //     'phone' => '0987654321'
        // ]);
        $customers = [];

        // Menambahkan 100 data pengguna ke dalam array
        for ($i = 1; $i <= 100; $i++) {
            $customers[] = [
                'name' => 'User ' . $i,  // Nama pengguna, seperti 'User 1', 'User 2', dll.
                'email' => 'user' . $i . '@example.com',  // Email unik untuk setiap pengguna
                'phone' => '0812' . str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT),  // Nomor telepon acak
                'created_at' => now(),  // Waktu pembuatan
                'updated_at' => now(),  // Waktu pembaruan
            ];
        }

        // Batch insert 100 data pengguna sekaligus
        DB::table('customers')->insert($customers);
    }
}
