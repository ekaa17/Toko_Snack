<?php

namespace Database\Seeders;

use App\Models\Transactions;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Transactions::create([
        //     'customer_id' => 1,
        //     'date' => '2024-01-01',
        // ]);

        // Transactions::create([
        //     'customer_id' => 2,
        //     'date' => '2024-02-01',
        // ]);

        $data = [];

        // Ambil semua id customer yang ada di tabel customers
        $customerIds = DB::table('customers')->pluck('id')->toArray();

        // Jika tidak ada customer, berhenti
        if (empty($customerIds)) {
            return;
        }

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'customer_id' => $customerIds[array_rand($customerIds)], // Pilih customer secara acak
                'date' => Carbon::now()->subDays(rand(0, 365)), // Generate tanggal acak dalam satu tahun terakhir
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('transactions')->insert($data);
    }
    
}
