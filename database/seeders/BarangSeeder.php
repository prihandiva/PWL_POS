<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Barang dari Supplier 1: PT. Elektronik Jaya
            ['barang_id' => 101, 'kategori_id' => 1, 'barang_kode' => 'ELK001', 'barang_nama' => 'Laptop Acer Aspire', 'harga_beli' => 7000000, 'harga_jual' => 8500000],
            ['barang_id' => 102, 'kategori_id' => 1, 'barang_kode' => 'ELK002', 'barang_nama' => 'Smart TV Samsung', 'harga_beli' => 4000000, 'harga_jual' => 5000000],
            ['barang_id' => 103, 'kategori_id' => 1, 'barang_kode' => 'ELK003', 'barang_nama' => 'Smartphone Xiaomi', 'harga_beli' => 3000000, 'harga_jual' => 3800000],
            ['barang_id' => 104, 'kategori_id' => 1, 'barang_kode' => 'ELK004', 'barang_nama' => 'Headphone Sony', 'harga_beli' => 800000, 'harga_jual' => 1000000],
            ['barang_id' => 105, 'kategori_id' => 1, 'barang_kode' => 'ELK005', 'barang_nama' => 'Kamera Canon EOS', 'harga_beli' => 6000000, 'harga_jual' => 7500000],
        
            // Barang dari Supplier 2: CV. Pakaian Nusantara
            ['barang_id' => 201, 'kategori_id' => 2, 'barang_kode' => 'PAK001', 'barang_nama' => 'Kemeja Batik Pria', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 202, 'kategori_id' => 2, 'barang_kode' => 'PAK002', 'barang_nama' => 'Jaket Kulit Wanita', 'harga_beli' => 500000, 'harga_jual' => 650000],
            ['barang_id' => 203, 'kategori_id' => 2, 'barang_kode' => 'PAK003', 'barang_nama' => 'Kaos Polos Katun', 'harga_beli' => 80000, 'harga_jual' => 120000],
            ['barang_id' => 204, 'kategori_id' => 2, 'barang_kode' => 'PAK004', 'barang_nama' => 'Celana Jeans Pria', 'harga_beli' => 180000, 'harga_jual' => 250000],
            ['barang_id' => 205, 'kategori_id' => 2, 'barang_kode' => 'PAK005', 'barang_nama' => 'Rok Mini Denim', 'harga_beli' => 120000, 'harga_jual' => 170000],
        
            // Barang dari Supplier 3: UD. Sembako Makmur
            ['barang_id' => 301, 'kategori_id' => 3, 'barang_kode' => 'MNM001', 'barang_nama' => 'Beras Premium 10kg', 'harga_beli' => 90000, 'harga_jual' => 120000],
            ['barang_id' => 302, 'kategori_id' => 3, 'barang_kode' => 'MNM002', 'barang_nama' => 'Minyak Goreng 2L', 'harga_beli' => 25000, 'harga_jual' => 35000],
            ['barang_id' => 303, 'kategori_id' => 3, 'barang_kode' => 'MNM003', 'barang_nama' => 'Gula Pasir 1kg', 'harga_beli' => 12000, 'harga_jual' => 18000],
            ['barang_id' => 304, 'kategori_id' => 3, 'barang_kode' => 'MNM004', 'barang_nama' => 'Tepung Terigu 1kg', 'harga_beli' => 8000, 'harga_jual' => 12000],
            ['barang_id' => 305, 'kategori_id' => 3, 'barang_kode' => 'MNM005', 'barang_nama' => 'Susu Bubuk 500g', 'harga_beli' => 45000, 'harga_jual' => 60000],
        ];
        DB::table('m_barang')-> insert($data);
    }
}
