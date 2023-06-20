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
        Schema::create('detail_penjual', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama_toko',40);
            $table->string('alamat_toko');
            $table->text('deskripsi_toko');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjual');
    }
};
