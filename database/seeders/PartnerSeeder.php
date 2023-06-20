<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'nama_lengkap'=>'Partner 1',
            'email'=>'partner1@gmail.com',
            'username'=>'partner1',
            'password'=>Hash::make('111111'),
            'nomor_telepon'=>'0871',
            'alamat'=>'Jember',
            'tanggal_lahir'=>'2222-02-02',
            'jenis_kelamin'=>'Laki-laki',
            'role'=>'partner',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
