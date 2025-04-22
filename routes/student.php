<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardStudentController;

route::prefix('students')->group(function () {
    Route::get('dashboard', DashboardStudentController::class)->name('students.dashboard');
});
?>