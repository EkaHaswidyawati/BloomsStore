<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningPenjual extends Model
{
    use HasFactory;

    protected $table = 'rekening_penjual';

    protected $guarded = [
        'id',
    ];
}
