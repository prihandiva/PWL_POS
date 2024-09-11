<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Stok untuk Supplier 1: PT. Elektronik Jaya
            ['stok_id' => 1, 'supplier_id' => 1, 'barang_id' => 101, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 50],
            ['stok_id' => 2, 'supplier_id' => 1, 'barang_id' => 102, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 30],
            ['stok_id' => 3, 'supplier_id' => 1, 'barang_id' => 103, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 100],
            ['stok_id' => 4, 'supplier_id' => 1, 'barang_id' => 104, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 150],
            ['stok_id' => 5, 'supplier_id' => 1, 'barang_id' => 105, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 20],
        
            // Stok untuk Supplier 2: CV. Pakaian Nusantara
            ['stok_id' => 6, 'supplier_id' => 2, 'barang_id' => 201, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 200],
            ['stok_id' => 7, 'supplier_id' => 2, 'barang_id' => 202, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 75],
            ['stok_id' => 8, 'supplier_id' => 2, 'barang_id' => 203, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 300],
            ['stok_id' => 9, 'supplier_id' => 2, 'barang_id' => 204, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 120],
            ['stok_id' => 10, 'supplier_id' => 2, 'barang_id' => 205, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 180],
        
            // Stok untuk Supplier 3: UD. Sembako Makmur
            ['stok_id' => 11, 'supplier_id' => 3, 'barang_id' => 301, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 500],
            ['stok_id' => 12, 'supplier_id' => 3, 'barang_id' => 302, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 400],
            ['stok_id' => 13, 'supplier_id' => 3, 'barang_id' => 303, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 600],
            ['stok_id' => 14, 'supplier_id' => 3, 'barang_id' => 304, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 700],
            ['stok_id' => 15, 'supplier_id' => 3, 'barang_id' => 305, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 350],
        ];
        
        DB::table('t_stok')->insert($data);
        
    }
}
