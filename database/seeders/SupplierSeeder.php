<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['supplier_id' => 1, 'supplier_kode' => 'SUP001', 'supplier_nama' => 'PT. Sumber Pangan Nusantara', 'supplier_alamat' => 'Jl. Sudirman No. 123, Jakarta'],
            ['supplier_id' => 2, 'supplier_kode' => 'SUP002', 'supplier_nama' => 'CV. Minuman Segar Sejahtera', 'supplier_alamat' => 'Jl. Merdeka No. 45, Bandung'],
            ['supplier_id' => 3, 'supplier_kode' => 'SUP003', 'supplier_nama' => 'UD. Rasa Manis Cendana', 'supplier_alamat' => 'Jl. Diponegoro No. 78, Surabaya'],
            ['supplier_id' => 4, 'supplier_kode' => 'SUP004', 'supplier_nama' => 'PT. Hidangan Nusantara Lestari', 'supplier_alamat' => 'Jl. Gajah Mada No. 32, Yogyakarta'],
            ['supplier_id' => 5, 'supplier_kode' => 'SUP005', 'supplier_nama' => 'CV. Speciality Foods Indonesia', 'supplier_alamat' => 'Jl. Pahlawan No. 88, Semarang'],
        ];
        
        DB::table('m_supplier')->insert($data);
        
    }
}
