<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaturaBeneficiaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_id',
        'path',
    ];
}
