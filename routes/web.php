<?php

use App\Http\Controllers\backend\ActivityController;
use App\Http\Controllers\backend\CashInController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\LoanController;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// route clear
Route::get('/clear', function () {
    Artisan::call('optimize:clear');

    return redirect()->route('home');
});


Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // cash In route
    Route::get( '/cashin', [CashInController::class, 'index'] )->name( 'cashin.index' );
    // loan route
    Route::get( '/loan', [LoanController::class, 'index'] )->name( 'loan.index' );
    // users route
    Route::get( '/users', [UserController::class, 'index'] )->name( 'users.index' );
    // activity route
    Route::get( '/activity', [ActivityController::class, 'index'] )->name( 'activity.index' );
});


require __DIR__.'/auth.php';
