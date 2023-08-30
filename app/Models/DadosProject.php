<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DadosProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'projects_id',
        'status_project_id',
        'documento',
        'notas',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusProjet::class, 'status_project_id');
    }
}
