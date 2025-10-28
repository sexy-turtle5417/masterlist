<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolYear extends Model
{
    //
    public function semesters(): HasMany
    {
        return $this->hasMany(Semester::class);
    }
}
