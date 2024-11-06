<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Kategori Makanan
            ['barang_id' => 101, 'kategori_id' => 1, 'menu_kode' => 'MKN001', 'menu_nama' => 'Nasi Goreng', 'harga_beli' => 15000, 'harga_jual' => 25000],
            ['barang_id' => 102, 'kategori_id' => 1, 'menu_kode' => 'MKN002', 'menu_nama' => 'Rendang Sapi', 'harga_beli' => 30000, 'harga_jual' => 45000],
            ['barang_id' => 103, 'kategori_id' => 1, 'menu_kode' => 'MKN003', 'menu_nama' => 'Sate Ayam', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['barang_id' => 104, 'kategori_id' => 1, 'menu_kode' => 'MKN004', 'menu_nama' => 'Gado-Gado', 'harga_beli' => 10000, 'harga_jual' => 20000],
            ['barang_id' => 105, 'kategori_id' => 1, 'menu_kode' => 'MKN005', 'menu_nama' => 'Soto Ayam', 'harga_beli' => 15000, 'harga_jual' => 25000],
        
            // Kategori Minuman
            ['barang_id' => 201, 'kategori_id' => 2, 'menu_kode' => 'MNM001', 'menu_nama' => 'Es Teh Manis', 'harga_beli' => 3000, 'harga_jual' => 7000],
            ['barang_id' => 202, 'kategori_id' => 2, 'menu_kode' => 'MNM002', 'menu_nama' => 'Es Jeruk', 'harga_beli' => 5000, 'harga_jual' => 10000],
            ['barang_id' => 203, 'kategori_id' => 2, 'menu_kode' => 'MNM003', 'menu_nama' => 'Jus Alpukat', 'harga_beli' => 8000, 'harga_jual' => 15000],
            ['barang_id' => 204, 'kategori_id' => 2, 'menu_kode' => 'MNM004', 'menu_nama' => 'Es Kopi Susu', 'harga_beli' => 10000, 'harga_jual' => 18000],
            ['barang_id' => 205, 'kategori_id' => 2, 'menu_kode' => 'MNM005', 'menu_nama' => 'Wedang Jahe', 'harga_beli' => 5000, 'harga_jual' => 10000],
        
            // Kategori Dessert (Pencuci Mulut)
            ['barang_id' => 301, 'kategori_id' => 3, 'menu_kode' => 'DSR001', 'menu_nama' => 'Es Cendol', 'harga_beli' => 5000, 'harga_jual' => 10000],
            ['barang_id' => 302, 'kategori_id' => 3, 'menu_kode' => 'DSR002', 'menu_nama' => 'Pisang Goreng', 'harga_beli' => 3000, 'harga_jual' => 7000],
            ['barang_id' => 303, 'kategori_id' => 3, 'menu_kode' => 'DSR003', 'menu_nama' => 'Kue Lupis', 'harga_beli' => 4000, 'harga_jual' => 8000],
            ['barang_id' => 304, 'kategori_id' => 3, 'menu_kode' => 'DSR004', 'menu_nama' => 'Klepon', 'harga_beli' => 3000, 'harga_jual' => 7000],
            ['barang_id' => 305, 'kategori_id' => 3, 'menu_kode' => 'DSR005', 'menu_nama' => 'Bubur Ketan Hitam', 'harga_beli' => 4000, 'harga_jual' => 9000],
        
            // Kategori Pembuka (Appetizer)
            ['barang_id' => 401, 'kategori_id' => 4, 'menu_kode' => 'APP001', 'menu_nama' => 'Singkong Goreng', 'harga_beli' => 3000, 'harga_jual' => 6000],
            ['barang_id' => 402, 'kategori_id' => 4, 'menu_kode' => 'APP002', 'menu_nama' => 'Tahu Isi', 'harga_beli' => 2000, 'harga_jual' => 5000],
            ['barang_id' => 403, 'kategori_id' => 4, 'menu_kode' => 'APP003', 'menu_nama' => 'Tempe Mendoan', 'harga_beli' => 2000, 'harga_jual' => 5000],
            ['barang_id' => 404, 'kategori_id' => 4, 'menu_kode' => 'APP004', 'menu_nama' => 'Perkedel Kentang', 'harga_beli' => 3000, 'harga_jual' => 7000],
            ['barang_id' => 405, 'kategori_id' => 4, 'menu_kode' => 'APP005', 'menu_nama' => 'Martabak Mini', 'harga_beli' => 5000, 'harga_jual' => 10000],
        
            // Kategori Menu Spesial
            ['barang_id' => 501, 'kategori_id' => 5, 'menu_kode' => 'MSN001', 'menu_nama' => 'Nasi Tumpeng', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 502, 'kategori_id' => 5, 'menu_kode' => 'MSN002', 'menu_nama' => 'Ikan Bakar Jimbaran', 'harga_beli' => 40000, 'harga_jual' => 60000],
            ['barang_id' => 503, 'kategori_id' => 5, 'menu_kode' => 'MSN003', 'menu_nama' => 'Ayam Betutu', 'harga_beli' => 35000, 'harga_jual' => 50000],
            ['barang_id' => 504, 'kategori_id' => 5, 'menu_kode' => 'MSN004', 'menu_nama' => 'Sop Buntut', 'harga_beli' => 40000, 'harga_jual' => 60000],
            ['barang_id' => 505, 'kategori_id' => 5, 'menu_kode' => 'MSN005', 'menu_nama' => 'Rawon', 'harga_beli' => 30000, 'harga_jual' => 45000],
        ];
        
        DB::table('m_menu')->insert($data);
        
    }
}
