<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;

    protected $table = 'm_menu';
    protected $primaryKey = 'barang_id';
    protected $fillable = [
        'kategori_id',
        'menu_kode',
        'menu_nama',
        'harga_beli',
        'harga_jual',
    ];

    // Define any relationships
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 
        'kategori_id');
    }

    public $timestamps = false;
}