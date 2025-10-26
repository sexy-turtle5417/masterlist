<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    public $timestamps = false;

    public function cadets(): BelongsToMany
    {
        return $this->belongsToMany(Cadet::class)
            ->withTimestamps()
            ->withPivot('title');
    }
}
