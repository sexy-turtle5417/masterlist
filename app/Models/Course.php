<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    //
    public $timestamps = false;

    public function semesters(): BelongsToMany
    {
        return $this->belongsToMany(Semester::class)
            ->using(CourseSemester::class)
            ->withTimestamps();
    }
}
