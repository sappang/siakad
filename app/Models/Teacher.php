<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'faculty_id',
        'department_id',
        'teacher_number',
        'academic_title',
    ];
}
