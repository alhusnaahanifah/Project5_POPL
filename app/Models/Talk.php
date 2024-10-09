<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talk extends Model
{
    use HasFactory;

    protected $table = 'talks';
    protected $fillable = [
        'value',
        'user_id',
    ];
    /**
     * Get the user that owns the talk.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan relasi dengan model Komentar
    public function comments(): HasMany
    {
        return $this->hasMany(Komentar::class);
    }

}
