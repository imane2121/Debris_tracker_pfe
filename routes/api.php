<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Default route for authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Custom API routes for your forms

// Sign Up Route
Route::post('/signup', [AuthController::class, 'signup']);

// Login with Email Route
Route::post('/login/email', [AuthController::class, 'loginWithEmail']);

// Login with Username Route
Route::post('/login/username', [AuthController::class, 'loginWithUsername']);

// Report Submission Route
Route::post('/report', [ReportController::class, 'submitReport']);
