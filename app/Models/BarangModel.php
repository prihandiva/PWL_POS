<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id'; 
    protected $fillable = ['fk_kategori_id', 'barang_kode', 'barang_nama','harga_jual', 'harga_beli'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class,'fk_kategori_id','kategori_id');
    }

}