<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
