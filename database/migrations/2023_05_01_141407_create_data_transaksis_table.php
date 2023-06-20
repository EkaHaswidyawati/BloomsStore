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
        Schema::create('data_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjual_id');
            $table->foreignId('pembeli_id');
            $table->foreignId('barang_id');
            $table->string('alamat');
            $table->bigInteger('harga');
            $table->integer('jumlah');
            $table->integer('ongkir');
            $table->bigInteger('total_harga');
            $table->string('metode_pembayaran');
            $table->string('bukti_pembayaran');
            $table->enum('status_transaksi',['Pembayaran Pembeli','Verifikasi Admin','Konfirmasi Penjual','Sedang Dikirim','Transfer Penjual','Selesai','Gagal']);
            $table->timestamp('tanggal_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_transaksi');
    }
};
