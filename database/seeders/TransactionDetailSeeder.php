<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionsDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransactionsDetail::create([
            'transaction_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'total_price' => 199.98
        ]);

        TransactionsDetail::create([
            'transaction_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'total_price' => 199.99
        ]);

        TransactionsDetail::create([
            'transaction_id' => 2,
            'product_id' => 1,
            'quantity' => 3,
            'total_price' => 299.97
        ]);
    }


    //     $data = [];

    //     // Ambil semua id transaksi dan produk yang ada
    //     $transactionIds = DB::table('transactions')->pluck('id')->toArray();
    //     $productIds = DB::table('products')->pluck('id')->toArray();

    //     // Jika tidak ada transaksi atau produk, berhenti
    //     if (empty($transactionIds) || empty($productIds)) {
    //         return;
    //     }

    //     for ($i = 1; $i <= 100; $i++) {
    //         $transactionId = $transactionIds[array_rand($transactionIds)]; // Pilih transaksi secara acak
    //         $productId = $productIds[array_rand($productIds)]; // Pilih produk secara acak
    //         $quantity = rand(1, 10); // Set jumlah secara acak (misalnya antara 1 hingga 10)
    //         $totalPrice = $quantity * rand(100, 1000); // Hitung harga total dengan harga acak per produk

    //         $data[] = [
    //             'transaction_id' => $transactionId,
    //             'product_id' => $productId,
    //             'quantity' => $quantity,
    //             'total_price' => $totalPrice,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ];
    //     }

    //     DB::table('transaction_details')->insert($data);
    // }
}
