<?php

namespace App\Http\Controllers\Admin;

use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function __invoke(): Response{
        return inertia('Admin/Dashboard', [
            'page_settings' => [
                'title' => 'Dashboard',
                'subtitle' => 'Menampilkan semua Statistik di Platform ini.',
            ],
        ]);
    }
}
