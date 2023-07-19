<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'request_id',
        'status_id',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusProjet::class, 'status_id');
    }
}
