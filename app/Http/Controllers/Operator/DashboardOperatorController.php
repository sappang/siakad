<?php

namespace App\Http\Controllers\Operator;

use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardOperatorController extends Controller
{
    public function __invoke(): Response{
        return inertia('Operators/Dashboard', [
            'page_settings' => [
                'title' => 'Dashboard',
                'subtitle' => 'Menampilkan semua Statistik di Platform ini.',
            ],
        ]);
    }
}
