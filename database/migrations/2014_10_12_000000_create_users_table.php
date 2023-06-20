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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap',100);
            $table->string('email',35)->unique();
            $table->string('username',20)->unique();
            $table->string('password');
            $table->string('nomor_telepon',20)->unique();
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->enum('role',['admin','pembeli','penjual','partner']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
