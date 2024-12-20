<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_menu', function (Blueprint $table) {
            $table->id('barang_id');
            $table->unsignedBigInteger('kategori_id')->index();//indexing untuk ForeignKey(FK)
            $table->string('menu_kode',10)->unique();//unique()dibuat agar tidak duplikat
            $table->string('menu_nama',100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();

            //Mendifinisikan FK pada kolom kategori_id mengacu pad kolom kategori_id di tabel m_kategori
            $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_menu');
    }
};
