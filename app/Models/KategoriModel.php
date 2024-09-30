<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    // Tentukan nama tabel yang sesuai dengan database
    protected $table = 'm_kategori';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'kategori_id';

    // Tentukan jika primary key tidak auto-increment
    public $incrementing = true;

    // Tentukan tipe dari primary key jika bukan integer
    protected $keyType = 'int';

    // Atur timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;

    // Daftar kolom yang bisa diisi secara massal
    protected $fillable = [
        'kategori_kode',
        'kategori_nama'
    ];
}
