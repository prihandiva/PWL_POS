<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Detail untuk Penjualan 1
            ['detail_id' => 1, 'penjualan_id' => 1, 'barang_id' => 101, 'harga' => 20000, 'jumlah' => 1], // Nasi Goreng
            ['detail_id' => 2, 'penjualan_id' => 1, 'barang_id' => 102, 'harga' => 15000, 'jumlah' => 2], // Mie Goreng
            ['detail_id' => 3, 'penjualan_id' => 1, 'barang_id' => 103, 'harga' => 25000, 'jumlah' => 1], // Ayam Bakar
        
            // Detail untuk Penjualan 2
            ['detail_id' => 4, 'penjualan_id' => 2, 'barang_id' => 104, 'harga' => 18000, 'jumlah' => 3], // Soto Ayam
            ['detail_id' => 5, 'penjualan_id' => 2, 'barang_id' => 105, 'harga' => 10000, 'jumlah' => 1], // Tahu Isi
            ['detail_id' => 6, 'penjualan_id' => 2, 'barang_id' => 201, 'harga' => 12000, 'jumlah' => 5], // Sate Ayam
        
            // Detail untuk Penjualan 3
            ['detail_id' => 7, 'penjualan_id' => 3, 'barang_id' => 202, 'harga' => 20000, 'jumlah' => 2], // Sop Buntut
            ['detail_id' => 8, 'penjualan_id' => 3, 'barang_id' => 203, 'harga' => 25000, 'jumlah' => 4], // Rendang
            ['detail_id' => 9, 'penjualan_id' => 3, 'barang_id' => 204, 'harga' => 15000, 'jumlah' => 3], // Nasi Uduk
        
            // Detail untuk Penjualan 4
            ['detail_id' => 10, 'penjualan_id' => 4, 'barang_id' => 205, 'harga' => 10000, 'jumlah' => 6], // Bakso
            ['detail_id' => 11, 'penjualan_id' => 4, 'barang_id' => 301, 'harga' => 25000, 'jumlah' => 2], // Gado-gado
            ['detail_id' => 12, 'penjualan_id' => 4, 'barang_id' => 302, 'harga' => 15000, 'jumlah' => 10], // Ketoprak
        
            // Detail untuk Penjualan 5
            ['detail_id' => 13, 'penjualan_id' => 5, 'barang_id' => 303, 'harga' => 30000, 'jumlah' => 15], // Bebek Goreng
            ['detail_id' => 14, 'penjualan_id' => 5, 'barang_id' => 304, 'harga' => 12000, 'jumlah' => 12], // Pecel Lele
            ['detail_id' => 15, 'penjualan_id' => 5, 'barang_id' => 305, 'harga' => 18000, 'jumlah' => 8],  // Nasi Campur
        
            // Detail untuk Penjualan 6
            ['detail_id' => 16, 'penjualan_id' => 6, 'barang_id' => 101, 'harga' => 20000, 'jumlah' => 1], // Nasi Goreng
            ['detail_id' => 17, 'penjualan_id' => 6, 'barang_id' => 201, 'harga' => 12000, 'jumlah' => 2], // Sate Ayam
            ['detail_id' => 18, 'penjualan_id' => 6, 'barang_id' => 302, 'harga' => 15000, 'jumlah' => 5], // Ketoprak
        
            // Detail untuk Penjualan 7
            ['detail_id' => 19, 'penjualan_id' => 7, 'barang_id' => 103, 'harga' => 25000, 'jumlah' => 2], // Ayam Bakar
            ['detail_id' => 20, 'penjualan_id' => 7, 'barang_id' => 202, 'harga' => 20000, 'jumlah' => 3], // Sop Buntut
            ['detail_id' => 21, 'penjualan_id' => 7, 'barang_id' => 204, 'harga' => 15000, 'jumlah' => 4], // Nasi Uduk
        
            // Detail untuk Penjualan 8
            ['detail_id' => 22, 'penjualan_id' => 8, 'barang_id' => 105, 'harga' => 10000, 'jumlah' => 1], // Tahu Isi
            ['detail_id' => 23, 'penjualan_id' => 8, 'barang_id' => 301, 'harga' => 25000, 'jumlah' => 8], // Gado-gado
            ['detail_id' => 24, 'penjualan_id' => 8, 'barang_id' => 303, 'harga' => 30000, 'jumlah' => 20], // Bebek Goreng
        
            // Detail untuk Penjualan 9
            ['detail_id' => 25, 'penjualan_id' => 9, 'barang_id' => 201, 'harga' => 12000, 'jumlah' => 3], // Sate Ayam
            ['detail_id' => 26, 'penjualan_id' => 9, 'barang_id' => 302, 'harga' => 15000, 'jumlah' => 10], // Ketoprak
            ['detail_id' => 27, 'penjualan_id' => 9, 'barang_id' => 305, 'harga' => 18000, 'jumlah' => 6], // Nasi Campur
        
            // Detail untuk Penjualan 10
            ['detail_id' => 28, 'penjualan_id' => 10, 'barang_id' => 101, 'harga' => 20000, 'jumlah' => 1], // Nasi Goreng
            ['detail_id' => 29, 'penjualan_id' => 10, 'barang_id' => 104, 'harga' => 18000, 'jumlah' => 4], // Soto Ayam
            ['detail_id' => 30, 'penjualan_id' => 10, 'barang_id' => 204, 'harga' => 15000, 'jumlah' => 5], // Nasi Uduk
        ];
        
        DB::table('t_penjualan_detail')->insert($data);
        
        
    }
}
