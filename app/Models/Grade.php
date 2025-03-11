<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    protected $fillable = [
        'course_id',
        'student_id',
        'classroom_id',
        'grade',
        'section',
        'category',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
}
