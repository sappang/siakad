<?php

namespace App\Http\Controllers\Teacher;

use Inertia\Response;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardTeacherController extends Controller
{
    public function __invoke(): Response{
        return inertia('Teachers/Dashboard', [
            'page_settings' => [
                'title' => 'Dashboard',
                'subtitle' => 'Menampilkan semua Statistik di Platform ini.',
            ],
            'count'=>[
                'courses'=> Course::query()
                ->where('teacher_id', auth()->user()->teacher->id)->count(),
                'classrooms'=> Classroom::query()
                ->wherehas('schedules.course',fn($query) => $query->where('teacher_id', auth()->user()->teacher->id))
                ->count(),
                'schedules'=> Schedule::query()
                ->wherehas('course',fn($query) => $query->where('teacher_id', auth()->user()->teacher->id))
                ->count(),
            ]
        ]);
    }
}
