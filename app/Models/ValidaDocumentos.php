<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidaDocumentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_id',
        'status_rg_cnh',
        'status_cnpj',
        'status_fatura_uc',
        'status_procuracao',
        'status_padrao_de_entrada',
    ];
}
