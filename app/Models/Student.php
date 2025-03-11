<?php

namespace App\Models;

use App\Models\User;
use App\Models\Grade;
use App\Models\Faculty;
use App\Models\FeeGroup;
use App\Models\Classroom;
use App\Models\StudyPlan;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\StudyResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'faculty_id',
        'department_id',
        'classroom_id',   
        'student_number',
        'semester',
        'batch',
        'fee_group_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function feeGroup(): BelongsTo
    {
        return $this->belongsTo(FeeGroup::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
    
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function studyPlans(): HasMany
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function studyResults(): HasMany
    {
        return $this->hasMany(StudyResult::class);
    }
}
