<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardTeacherController;


route::prefix('teachers')->middleware(['auth','role:Teacher'])->group(function () {
    Route::get('dashboard', DashboardTeacherController::class)->name('teachers.dashboard');
});
?>