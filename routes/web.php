<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Define the routes in Laravel 5 style
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/overview', [HomeController::class, 'overview'])->name('overview');
Route::get('/signInWithEmail', [HomeController::class, 'signInWithEmail'])->name('signInWithEmail');
Route::get('/signInWithUsername', [HomeController::class, 'signInWithUsername'])->name('signInWithUsername');
Route::get('/signUp', [HomeController::class, 'signUp'])->name('signUp');
Route::get('/article', [HomeController::class, 'article'])->name('article');
Route::get('/contributerHome', [HomeController::class, 'contributerHome'])->name('contributerHome');
Route::get('/report', [HomeController::class, 'report'])->name('report');
Route::get('/account', [HomeController::class, 'account'])->name('account');