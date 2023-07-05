<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKit extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'kwp',
        'fotovoltaico',
        'inversor',
        'datasheet',
    ];
}
