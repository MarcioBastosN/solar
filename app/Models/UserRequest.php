<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'register_id',
        'status_id',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusProjet::class, 'status_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, "customer_id");
    }

    public function register(): BelongsTo
    {
        return $this->belongsTo(Register::class, "register_id");
    }
}
