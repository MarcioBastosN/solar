<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidaDocuemnto extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_id',
        'documento',
        'status',
        'obs'
    ];
}
