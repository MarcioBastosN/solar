<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ValidaDocumento extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_id',
        'documento',
        'status_id',
        'obs'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusDocumentos::class, 'status_id');
    }
}
