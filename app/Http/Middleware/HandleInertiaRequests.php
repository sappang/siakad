<?php

namespace App\Http\Middleware;

use App\Models\Fee;
use Inertia\Middleware;
use App\Enums\FeeStatus;
use Tighten\Ziggy\Ziggy;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Resources\UserSingleResource;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user() ? new UserSingleResource($request->user()) : null,
            ],

            'flash_message'=> fn()=>[
                'type' => $request->session()->get('type'),
                'message' => $request->session()->get('message'),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'academic_year'=> fn()=> AcademicYear::query()->where('is_active',true)->first(),
            'checkfee'=> fn()=> $request->user() && $request->user()->student
            ? Fee::query()
            ->where('student_id',auth()->user()->student->id)
            ->where('academic_year_id',activeAcademicYear()->id)
            ->where('status',FeeStatus::SUCCESS->value)
            : null
            ,
        ];
    }
}
