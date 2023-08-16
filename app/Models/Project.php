<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager_id',
        'user_request_id',
    ];

    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }


    public function contratante(): BelongsTo
    {
        return $this->belongsTo(UserRequest::class, 'user_request_id');
    }

    public function statusDocumentos(): BelongsTo
    {
        return $this->belongsTo(ValidaDocumento::class, "user_request_id");
    }
}
