<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CollecteController;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\AuthController;

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

// Default route
Route::get('/', [HomeController::class, 'overview'])->name('overview');
Route::get('/overview', [HomeController::class, 'overview'])->name('overview');

// Auth routes
Route::get('/signInWithEmail', [HomeController::class, 'signInWithEmail'])->name('signInWithEmail');
Route::get('/signInWithUsername', [HomeController::class, 'signInWithUsername'])->name('signInWithUsername');
Route::get('/signUp', [AuthController::class, 'showSignUpForm'])->name('signUp');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login/email', [AuthController::class, 'loginWithEmail'])->name('login.email');
Route::post('/login/username', [AuthController::class, 'loginWithUsername'])->name('login.username');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Home routes
Route::get('/article', [HomeController::class, 'article'])->name('article');
Route::get('/contributerHome', [ArticleController::class, 'contributerHome'])->name('contributerHome');
Route::get('/report', [HomeController::class, 'report'])->name('report');
Route::get('/account', [HomeController::class, 'account'])->name('account');

// Article routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/contributer/home', [ArticleController::class, 'contributerHome'])->name('articles.contributerHome');

// Collecte routes
Route::get('/collectes', [CollecteController::class, 'index'])->name('collectes.index');
Route::get('/collectes/overview', [CollecteController::class, 'overview'])->name('collectes.overview');
Route::get('/supervisorDashboard', [CollecteController::class, 'supervisorDashboard'])->name('supervisor.dashboard');
Route::post('/collecte/store', [CollecteController::class, 'storeCollecte'])->name('store.collecte');

// Signal routes
Route::get('/signals', [SignalController::class, 'index'])->name('signals.index');
Route::delete('/signals/{id}', [SignalController::class, 'destroy'])->name('signals.destroy');