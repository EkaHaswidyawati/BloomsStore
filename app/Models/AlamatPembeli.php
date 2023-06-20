<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPembeli extends Model
{
    use HasFactory;

    protected $table = 'alamat_pembeli';

    protected $guarded = [
        'id'
    ];
}
