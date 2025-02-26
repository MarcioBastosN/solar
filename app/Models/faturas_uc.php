<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faturas_uc extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_id',
        'path',
    ];
}
