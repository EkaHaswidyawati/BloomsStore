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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjual_id');
            $table->string('nama',50);
            $table->bigInteger('harga');
            $table->string('gambar');
            $table->integer('berat');
            $table->string('kategori',50);
            $table->bigInteger('stok');
            $table->text('detail_produk');
            $table->enum('status',['ready','discontinue']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
