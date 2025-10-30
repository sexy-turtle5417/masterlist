<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Semester extends Model
{
    //
    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function cadets(): BelongsToMany
    {
        return $this->belongsToMany(Cadet::class, 'enrollments', 'semester_id', 'cadet_id')
            ->withTimestamps();
    }
}
