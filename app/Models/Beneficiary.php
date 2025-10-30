<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Beneficiary extends Model
{
    /** @use HasFactory<\Database\Factories\BeneficiaryFactory> */
    use HasFactory;

    public $timestamps = false;

    public function cadets(): BelongsToMany
    {
        return $this->belongsToMany(Cadet::class)
            ->withTimestamps()
            ->withPivot('relationship');
    }

    public function contactNumbers(): BelongsToMany
    {
        return $this->belongsToMany(ContactNumber::class)
            ->withTimestamps()
            ->withPivot('title');
    }
}
