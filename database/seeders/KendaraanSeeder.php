<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kendaraans')->insert([
            [
                'nama_kendaraan' => 'Motor',
                'tarif_per_km' => 2000,
                'kecepatan_rata' => 40,
                'status' => 'aktif'
            ],
            [
                'nama_kendaraan' => 'Mobil',
                'tarif_per_km' => 5000,
                'kecepatan_rata' => 60,
                'status' => 'aktif'
            ]
        ]);
    }
}
