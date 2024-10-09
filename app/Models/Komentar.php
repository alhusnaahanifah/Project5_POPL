<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'talk_id',
        'user_id',
        'komentar',
    ];

    public function talk(): BelongsTo
    {
        return $this->belongsTo(Talk::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
