<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo_pessoa',
        'cnpj',
        'rg_cnh',
        'procuracao',
        'fatura_da_uc',
        'padrao_de_entrada',
        'dijuntor_id',
        'user_kit_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
