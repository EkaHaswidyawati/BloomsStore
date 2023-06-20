<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjual extends Model
{
    use HasFactory;

    protected $table = 'detail_penjual';

    protected $guarded = [
        'id',
    ];

    public function datatransaksi()
    {
        return $this->hasMany(DataTransaksi::class);
    }
}
