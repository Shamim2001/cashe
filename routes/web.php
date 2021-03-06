<?php

use App\Http\Controllers\backend\ActivityController;
use App\Http\Controllers\backend\CashInController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\LoanController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\UserManagementController;
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
    Route::delete( '/cashin/delete/{id}', [CashInController::class, 'delete'] )->name( 'cashin.delete' );

    // Resourse Route
    Route::resource('/loan', LoanController::class);
    Route::resource( '/users', UserController::class );

    // profile
   // route::get('/profile/{user}', [UserController::class, 'profile'])->name('users.profile');
    // email send
    Route::get('/mail/send/{user}', [UserController::class, 'sendEmail'])->name('users.sendEmail');
    // activity route
    Route::get( '/activity', [ActivityController::class, 'index'] )->name( 'activity.index' );

    Route::get('user-management', [UserManagementController::class, 'index'])->name('user.management.index');
    Route::get('user/edit/{user}', [UserManagementController::class, 'userEdit'])->name('user.edit');
    Route::put('user/update/{user}', [UserManagementController::class, 'userUpdate'])->name('user.update');
    Route::delete('user/delete/{user}', [UserManagementController::class, 'userDelete'])->name('user.delete');

    // Role
    Route::get('user-roles', [UserManagementController::class, 'roleIndex'])->name('user.role.index');
    Route::match(['put', 'post'], 'user-roles/store', [UserManagementController::class, 'roleStore'])->name('role.store');
    Route::delete('user-roles/delete/{role}', [UserManagementController::class, 'roleDelete'])->name('role.delete');

    // Permission
    Route::get( 'user-permissions', [UserManagementController::class, 'permissionIndex'] )->name( 'user.permission.index' );
    Route::match(['put', 'post'], 'user-permissions/store', [UserManagementController::class, 'permissionStore'])->name('permission.store');
    Route::delete('user-permissions/delete/{permission}', [UserManagementController::class, 'permissionDelete'])->name('permission.delete');
});


require __DIR__.'/auth.php';
