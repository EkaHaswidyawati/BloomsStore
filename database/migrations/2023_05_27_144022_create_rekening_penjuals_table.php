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
        Schema::create('rekening_penjual', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjual_id');
            $table->string('nama',100);
            $table->string('jenis_bank',20);
            $table->string('no_rekening',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekening_penjual');
    }
};
