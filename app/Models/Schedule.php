<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Classroom;
use App\Models\StudyPlan;
use App\Enums\ScheduleDay;
use App\Models\Department;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Schedule extends Model
{
    protected $fillable = [
        'faculty_id',
        'department_id',
        'course_id',
        'classroom_id',
        'academic_year_id',
        'start_time',
        'end_time',
        'day_of_week',
        'quote',
    ];

    protected function casts(): array
    {
        return [
            'day_of_week' => ScheduleDay::class,
        ];
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function studyPlans(): BelongsToMany
    {
        return $this->belongsToMany(StudyPlan::class, 'schedule_study_plan')->withTimestamps();
    }   
}
