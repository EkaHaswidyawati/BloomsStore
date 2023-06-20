<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $guarded = [
        'id',
    ];

    public function datatransaksi()
    {
        return $this->hasMany(DataTransaksi::class);
    }

    public function catatan()
    {
        return $this->hasMany(Pencatatan::class);
    }
}
