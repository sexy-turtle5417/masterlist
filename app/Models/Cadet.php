<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cadet extends Model
{
    //
    use HasFactory;

    public function courseSemester(): BelongsTo
    {
        return $this->belongsTo(CourseSemester::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function trainingSessions(): BelongsToMany
    {
        return $this->belongsToMany(TrainingSession::class, 'attendances');
    }

    public function hoursAttended(): float
    {
        return $this
            ->attendances()
            ->sum('hours_credit');
    }

    public function totalTrainingHours(): float
    {
        return $this->trainingSessions()
            ->where('is_remedial', false)
            ->sum('training_sessions.hours_credit');
    }
}
