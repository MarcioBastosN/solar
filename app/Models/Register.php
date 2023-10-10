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
        'observacao',
        'kwp',
        'fotovoltaico',
        'inversor',
        'datasheet',
    ];

    protected $dates = [
        'created_at'
    ];

    public function routeNotificationForWhatsApp()
    {
    return $this->telefone;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusRequest(): HasOne
    {
        return $this->hasOne(UserRequest::class, 'register_id');
    }

    public function possuiProjeto(): HasOne
    {
        return $this->hasOne(Project::class, 'user_request_id');
    }

    public function disjuntor(): BelongsTo
    {
        return $this->belongsTo(Dijuntor::class, 'dijuntor_id');
    }

    public function dadosProject(): HasMany
    {
        return $this->hasMany(DadosProject::class, 'projects_id');
    }

    public function registrosValidos(): HasMany
    {
        return $this->hasMany(DadosProject::class, 'projects_id')
            ->where(function ($query) {
                $query->where('documento', '!=', null)
                    ->orWhere('notas', '<>', null);
            });
    }

    public function validaDocumentos(): HasMany
    {
        return $this->hasMany(ValidaDocumento::class, 'register_id');
    }

    public function habilitaProjeto()
    {
        $validador = false;
        $valida = $this->hasMany(ValidaDocumento::class, 'register_id');
        if ($valida->sum("status_id") >= 15) {
            $validador = true;
        }
        return $validador;
    }
}
