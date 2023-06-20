<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'id'=>1,
                'nama_lengkap'=>'Penjual 1',
                'email'=>'penjual1@gmail.com',
                'username'=>'penjual1',
                'password'=>Hash::make('111111'),
                'nomor_telepon'=>'08s1',
                'alamat'=>'Jember',
                'tanggal_lahir'=>'2001-01-01',
                'jenis_kelamin'=>'Laki-laki',
                'role'=>'penjual',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id'=>3,
                'nama_lengkap'=>'Penjual 2',
                'email'=>'penjual2@gmail.com',
                'username'=>'penjual2',
                'password'=>Hash::make('111111'),
                'nomor_telepon'=>'08s2',
                'alamat'=>'Jember',
                'tanggal_lahir'=>'2002-02-02',
                'jenis_kelamin'=>'Laki-laki',
                'role'=>'penjual',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
