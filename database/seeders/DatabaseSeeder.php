<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([StaffSeeder::class,]);
        $this->call([ProductSeeder::class,]);
        $this->call([CustomerSeeder::class,]);
        $this->call([SupplierSeeder::class,]);
        $this->call([TransactionSeeder::class,]);
        $this->call([TransactionDetailSeeder::class,]);
        
          
    }
}
