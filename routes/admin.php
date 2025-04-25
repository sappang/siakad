<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAdminController;

route::prefix('admin')->middleware(['auth','role:Admin'])->group(function () {
    Route::get('dashboard', DashboardAdminController::class)->name('admin.dashboard');
});
?>