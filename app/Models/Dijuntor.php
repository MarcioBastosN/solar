<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dijuntor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function registros(): BelongsTo
    {
        return $this->belongsTo(Register::class, 'dijuntor_id');
    }
}
