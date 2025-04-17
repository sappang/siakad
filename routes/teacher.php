<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardTeacherController;


route::prefix('teachers')->group(function () {
    Route::get('dashboard', DashboardTeacherController::class)->name('teachers.dashboard');
});
?>