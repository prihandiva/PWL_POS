<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuModel extends Model
{
    use HasFactory;

<<<<<<< HEAD:app/Models/BarangModel.php
    // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $table = 'm_barang'; // Ganti dengan nama tabel yang sesuai

    // Mendefinisikan primary key dari tabel barang
=======
    protected $table = 'm_menu';
>>>>>>> ce8e93b3395ff72a10ec1939d2f06e9120d0f31e:app/Models/MenuModel.php
    protected $primaryKey = 'barang_id';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
<<<<<<< HEAD:app/Models/BarangModel.php
        'kategori_id', 
        'barang_kode', 
        'barang_nama', 
        'harga_beli', 
        'harga_jual'
=======
        'kategori_id',
        'menu_kode',
        'menu_nama',
        'harga_beli',
        'harga_jual',
>>>>>>> ce8e93b3395ff72a10ec1939d2f06e9120d0f31e:app/Models/MenuModel.php
    ];

    // Hubungan dengan model Kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    // Tambahkan metode atau logika lain yang diperlukan untuk model ini
}