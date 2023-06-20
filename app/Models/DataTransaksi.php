<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi';

    protected $guarded = [
        'id'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function penjual()
    {
        return $this->belongsTo(DetailPenjual::class);
    }
    public function pembeli()
    {
        return $this->belongsTo(User::class);
    }
}
