<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusProjet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['label'];

    public function listStatusRequestUser(): BelongsTo
    {
        return $this->belongsTo(UserRequest::class, 'status_id');
    }

    public function listStatusProjec(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'status_id');
    }
}
