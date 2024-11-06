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
            // Stok untuk Supplier 1: PT. Sumber Pangan Nusantara
            ['stok_id' => 1, 'supplier_id' => 1, 'barang_id' => 101, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 150], // Nasi Goreng Spesial
            ['stok_id' => 2, 'supplier_id' => 1, 'barang_id' => 102, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 100], // Sate Ayam
            ['stok_id' => 3, 'supplier_id' => 1, 'barang_id' => 103, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 200], // Rendang Daging
            ['stok_id' => 4, 'supplier_id' => 1, 'barang_id' => 104, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 50],  // Sup Kambing
            ['stok_id' => 5, 'supplier_id' => 1, 'barang_id' => 105, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 75],  // Gado-Gado
        
            // Stok untuk Supplier 2: CV. Minuman Segar Sejahtera
            ['stok_id' => 6, 'supplier_id' => 2, 'barang_id' => 201, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 250], // Es Teh Manis
            ['stok_id' => 7, 'supplier_id' => 2, 'barang_id' => 202, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 180], // Jus Jeruk Segar
            ['stok_id' => 8, 'supplier_id' => 2, 'barang_id' => 203, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 300], // Air Mineral
            ['stok_id' => 9, 'supplier_id' => 2, 'barang_id' => 204, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 150], // Soda Manis
            ['stok_id' => 10, 'supplier_id' => 2, 'barang_id' => 205, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 200], // Kopi Hitam
        
            // Stok untuk Supplier 3: UD. Rasa Manis Cendana
            ['stok_id' => 11, 'supplier_id' => 3, 'barang_id' => 301, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 300], // Kue Lapis
            ['stok_id' => 12, 'supplier_id' => 3, 'barang_id' => 302, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 250], // Roti Bakar
            ['stok_id' => 13, 'supplier_id' => 3, 'barang_id' => 303, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 100], // Pudding Cokelat
            ['stok_id' => 14, 'supplier_id' => 3, 'barang_id' => 304, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 50],  // Kue Cubir
            ['stok_id' => 15, 'supplier_id' => 3, 'barang_id' => 305, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 400], // Es Krim
        
            // Stok untuk Supplier 4: PT. Hidangan Nusantara Lestari
            ['stok_id' => 16, 'supplier_id' => 4, 'barang_id' => 401, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 150], // Nasi Uduk
            ['stok_id' => 17, 'supplier_id' => 4, 'barang_id' => 402, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 100], // Ayam Penyet
            ['stok_id' => 18, 'supplier_id' => 4, 'barang_id' => 403, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 50],  // Tahu Tempe
            ['stok_id' => 19, 'supplier_id' => 4, 'barang_id' => 404, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 80],  // Kerupuk
            ['stok_id' => 20, 'supplier_id' => 4, 'barang_id' => 405, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 120], // Sambal
        
            // Stok untuk Supplier 5: CV. Speciality Foods Indonesia
            ['stok_id' => 21, 'supplier_id' => 5, 'barang_id' => 501, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 200], // Salad Buah
            ['stok_id' => 22, 'supplier_id' => 5, 'barang_id' => 502, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 300], // Pizza Margherita
            ['stok_id' => 23, 'supplier_id' => 5, 'barang_id' => 503, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 150], // Spaghetti Bolognese
            ['stok_id' => 24, 'supplier_id' => 5, 'barang_id' => 504, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 100], // Lasagna
            ['stok_id' => 25, 'supplier_id' => 5, 'barang_id' => 505, 'user_id' => 3, 'stok_tanggal' => now(), 'stok_jumlah' => 80],  // Burger
        ];
        
        DB::table('t_stok')->insert($data);
        
        
    }
}
