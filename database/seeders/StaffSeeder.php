<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'name' => 'Admin',
                'no_telepon' => '6287780776114',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'Admin',
                'profile' => 'admin.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Meilina',
                'no_telepon' => '6287780776114',
                'email' => 'Meilina@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'Karyawan',
                'profile' => 'user.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
