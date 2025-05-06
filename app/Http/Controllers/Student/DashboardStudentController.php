<?php

namespace App\Http\Controllers\Student;

use App\Models\Fee;
use Inertia\Response;
use App\Enums\FeeStatus;
use App\Models\StudyPlan;
use Illuminate\Http\Request;
use App\Enums\StudyPlanStatus;
use App\Http\Controllers\Controller;

class DashboardStudentController extends Controller
{
    public function __invoke(): Response{
        return inertia('Students/Dashboard', [
            'page_settings' => [
                'title' => 'Dashboard',
                'subtitle' => 'Menampilkan semua Statistik di Platform ini.',
            ],
            'count' =>[
                'study_plans_approved' => StudyPlan::query()
                ->where('status', StudyPlanStatus::APPROVED->value)
                ->count(),
                'study_plans_reject' => StudyPlan::query()
                ->where('status', StudyPlanStatus::REJECTED->value)
                ->count(),
                'total_payments'=> Fee::query()
                ->where('student_id', auth()->user()->id)
                ->where('status', FeeStatus::SUCCESS->value)
                ->with('feeGroup')
                ->get()
                ->sum(fn($fee) => $fee->feeGroup->amount),
            ],
        ]);
    }
}
