<?php

namespace App\Http\Controllers\Admin;

use Inertia\Response;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\FacultyResource;

class FacultyController extends Controller
{
    public function index(): Response{
        $faculties = Faculty::query()
            ->select(['id', 'name', 'slug', 'code', 'logo', 'created_at'])
            ->filter(request()->only('search'))
            ->sorting(request()->only(['field', 'direction']))
            ->paginate(request()->load ?? 10);
        return inertia('Admin/Faculties/Index', [
            'page_settings' => [
                'title' => 'Fakultas',
                'subtitle' => 'menampilkan semua data fakultas',
            ],
            'faculties' => FacultyResource::collection($faculties)->additional([
                'meta'=>[ 
                    'has_pages' => $faculties->hasPages(),
                ]
                ]),
            'state' =>[
                'page' => request()->page ?? 1,
                'search' => request()->search ?? '',
                'load' => 10
            ]
        ]);
    }
}
