<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    protected $fillable = ['faculty_id', 'department_id', 'academic_year_id', 'name', 'slug'];

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function courses(): HasManyTrough
    {
        return $this->hasManyThrough(
            Course::class,
            Schedule::class,
            'classroom_id',
            'id',
            'id',
            'course_id');
    }

}
