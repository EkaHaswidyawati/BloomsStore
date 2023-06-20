<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'id'=>4,
            'nama_lengkap'=>'Admin 1',
            'email'=>'admin1@gmail.com',
            'username'=>'admin1',
            'password'=>Hash::make('111111'),
            'nomor_telepon'=>'0851',
            'alamat'=>'Jember',
            'tanggal_lahir'=>'2002-04-02',
            'jenis_kelamin'=>'Laki-laki',
            'role'=>'admin',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
