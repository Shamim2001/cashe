<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\CashInController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
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
    // resourse route
    Route::resource('cashIn', CashInController::class);
    Route::resource('loan', LoanController::class);
    Route::resource('User', UserController::class);
    Route::resource('activity', ActivityController::class);
});


require __DIR__.'/auth.php';
