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
        'telefone',
        'tipo_pessoa',
        'identificacao_pf_pj',
        'procuracao',
        'fatura_da_uc',
        'padrao_de_entrada',
        'dijuntor_id',
        'user_kit_id',
        'observacao',
        'kwp',
        'fotovoltaico',
        'inversor',
        'datasheet',
    ];

    protected $dates = [
        'created_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusRequest(): HasOne
    {
        return $this->hasOne(UserRequest::class, 'request_id');
    }
}
