<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Routes for login and registration
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login.submit');

Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UserController::class, 'register'])->name('register.submit');

// Admin routes (only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    // Routes for admin managing users
    Route::get('admin/pending', [AdminController::class, 'showPendingCollecteSupervisors'])->name('admin.pending');
    Route::post('admin/approve/{userId}', [AdminController::class, 'approveCollecteSupervisor'])->name('admin.approve');
    Route::post('admin/reject/{userId}', [AdminController::class, 'rejectCollecteSupervisor'])->name('admin.reject');
});
