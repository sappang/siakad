<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\DashboardOperatorController;


route::prefix('operators')->group(function () {
    Route::get('dashboard', DashboardOperatorController::class)->name('operators.dashboard');
});
?>