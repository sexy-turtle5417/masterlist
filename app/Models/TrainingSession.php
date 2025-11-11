<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingSession extends Model
{
    //
    use HasFactory;

    public function cadets(): BelongsToMany
    {
        return $this->belongsToMany(Cadet::class, 'attendances');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
