<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cadet extends Model
{
    /** @use HasFactory<\Database\Factories\CadetFactory> */
    use HasFactory;

    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::class)
            ->withTimestamps()
            ->withPivot('title');
    }
}
