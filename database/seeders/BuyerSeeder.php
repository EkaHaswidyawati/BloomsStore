<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'id'=>2,
            'nama_lengkap'=>'Pembeli 1',
            'email'=>'pembeli1@gmail.com',
            'username'=>'pembeli1',
            'password'=>Hash::make('111111'),
            'nomor_telepon'=>'08b1',
            'alamat'=>'Jember',
            'tanggal_lahir'=>'2222-02-02',
            'jenis_kelamin'=>'Laki-laki',
            'role'=>'pembeli',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
