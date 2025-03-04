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
Route::post('/signUp', [HomeController::class, 'signUp'])->name('signUp');
Route::get('/signUp', [HomeController::class, 'signUp'])->name('signUp');
Route::post('/signUp', [HomeController::class, 'signUpPost'])->name('signUpPost');
Route::get('/article', [HomeController::class, 'article'])->name('article');
Route::get('/contributerHome', [HomeController::class, 'contributerHome'])->name('contributerHome');
Route::get('/report', [HomeController::class, 'report'])->name('report');
Route::get('/collectes', [HomeController::class, 'collectes'])->name('collectes');
Route::get('/account', [HomeController::class, 'account'])->name('account');
use App\Http\Controllers\ArticleController;

Route::get('/overview', [ArticleController::class, 'overview']);
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article');
// Define the overview route
Route::get('/overview', [ArticleController::class, 'overview'])->name('overview');

Route::get('/contributerHome', [ArticleController::class, 'contributerHome']);
// Define the overview route
Route::get('/contributerHome', [ArticleController::class, 'contributerHome'])->name('contributerHome');

use App\Http\Controllers\CollecteController;

Route::get('/collectes', [CollecteController::class, 'index']);

use App\Http\Controllers\SignalController;

// Signal routes
Route::get('/signals', [SignalController::class, 'index'])->name('signals.index');
Route::delete('/signals/{id}', [SignalController::class, 'destroy'])->name('signals.destroy');