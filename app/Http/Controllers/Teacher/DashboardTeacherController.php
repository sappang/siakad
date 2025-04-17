<?php

namespace App\Http\Controllers\Teacher;

use Inertia\Response;
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
        ]);
    }
}
