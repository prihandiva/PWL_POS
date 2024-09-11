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
            ['supplier_id' => 1, 'supplier_kode' => 'SUP001','supplier_nama'=> 'PT. Elektronik Jaya','supplier_alamat'=> 'Jl. Sudirman No. 123, Jakarta'],
            ['supplier_id' => 2, 'supplier_kode' => 'SUP002','supplier_nama'=> 'CV. Pakaian Nusantara','supplier_alamat'=> 'Jl. Merdeka No. 45, Bandung'],
            ['supplier_id' => 3, 'supplier_kode' => 'SUP003','supplier_nama'=> 'UD. Sembako Makmur','supplier_alamat'=> 'Jl. Diponegoro No. 78, Surabaya']
        ];
        DB::table('m_supplier')-> insert($data);
    }
}
