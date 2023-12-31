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
        'nome',
        'telefone',
        'tipo_pessoa',
        'dijuntor_id',
        'observacao',
        'kwp',
        'corrente_disjuntor',
        'fotovoltaico',
        'inversor',
    ];
    // 'cnh_socio',
    // 'fatura_beneficiaria'
    // 'padrao_de_entrada',
    // 'datasheet_inversor',
    // 'datasheet_modulo',
    // 'identificacao_pf_pj',
    // 'procuracao',
    // 'fatura_da_uc',

    protected $dates = [
        'created_at'
    ];

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

    public function listFaturas(): HasMany
    {
        return $this->hasMany(faturas_uc::class, 'register_id');
    }

    public function listCnhSocio(): HasMany
    {
        return $this->hasMany(Cnh_Socio::class, 'register_id');
    }

    public function listRgCnh(): HasMany
    {
        return $this->hasMany(RG_CNH::class, 'register_id');
    }

    public function listProcuracao(): HasMany
    {
        return $this->hasMany(Procuracao::class, 'register_id');
    }

    public function listDataSheetInversor(): HasMany
    {
        return $this->hasMany(DataSheetInversor::class, 'register_id');
    }

    public function listDataSheetModulo(): HasMany
    {
        return $this->hasMany(DataSheetModulo::class, 'register_id');
    }

    public function listBeneficiaria(): HasMany
    {
        return $this->hasMany(FaturaBeneficiaria::class, 'register_id');
    }
}
