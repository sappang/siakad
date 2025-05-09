<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    if (auth()->check()) {
        return to_route('dashboard');
    }
    else {
        return to_route('login');
    }
});


Route::get('/dashboard', function () {
    $roleToRoute = [
        'Admin'    => 'admin.dashboard',
        'Student'  => 'students.dashboard',
        'Teacher'  => 'teachers.dashboard',
        'Operator' => 'operators.dashboard',
        ];

        foreach ($roleToRoute as $role => $routeName) {
        if (auth()->user()->hasRole($role)) {
            $url = route($routeName, [], false);
            return redirect()->intended($url);
        }
        else {
            abort(404);
        }
        }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/operator.php';
require __DIR__.'/teacher.php';
require __DIR__.'/student.php';
