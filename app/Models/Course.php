<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    //
    use HasFactory;

    public function courseSemesters(): HasMany
    {
        return $this->hasMany(CourseSemester::class);
    }

    public function semesters(): BelongsToMany
    {
        return $this->belongsToMany(Semester::class)->withTimestamps();
    }

    public function cadets(): HasManyThrough
    {
        return $this->hasManyThrough(Cadet::class, CourseSemester::class);
    }
}
