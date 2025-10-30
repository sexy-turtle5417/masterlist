<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title'];

    public function cadets(): BelongsToMany
    {
        return $this->belongsToMany(Cadet::class, 'enrollments', 'cadet_id', 'course_id')
            ->withTimestamps();
    }
}
