<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cnpj',
        'rg_cnh',
        'procuracao',
        'fatura_da_uc',
        'padrao_de_entrada',
        'dijuntor_id',
        'user_kit_id',
    ];
}
