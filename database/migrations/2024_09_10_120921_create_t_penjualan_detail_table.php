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
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('penjualan_id')->index();//indexing untuk ForeignKey(FK)
            $table->unsignedBigInteger('barang_id')->index();//indexing untuk ForeignKey(FK)
            $table->integer('harga');
            $table->integer('jumlah');
            $table->timestamps();

            //Mendifinisikan FK pada kolom supplier_id mengacu pada kolom supplier_id di tabel m_supplier
            $table->foreign('penjualan_id')->references('penjualan_id')->on('t_penjualan');
            //Mendifinisikan FK pada kolom barang_id mengacu pada kolom barang_id di tabel m_barang
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};