<?php

namespace Database\Seeders;

use App\Models\DetailPenjual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPenjual::insert([
                [
                    'id'=>1,
                    'user_id'=>1,
                    'nama_toko'=>'Penjual 1 Toko',
                    'alamat_toko'=>'Jember',
                    'deskripsi_toko'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi voluptatem corporis doloribus voluptate molestiae veritatis, dolorem vel illum beatae aspernatur!',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'id'=>2,
                    'user_id'=>3,
                    'nama_toko'=>'Penjual 2 Toko',
                    'alamat_toko'=>'Jember',
                    'deskripsi_toko'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi voluptatem corporis doloribus voluptate molestiae veritatis, dolorem vel illum beatae aspernatur!',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
            ]);
    }
}
