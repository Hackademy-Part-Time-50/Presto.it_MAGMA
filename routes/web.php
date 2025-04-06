<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Middleware\ThrottlePasswordAttempts;
use Illuminate\Support\Facades\Route;

// Rotte per il reset della password
Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])
    ->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])
    ->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])
    ->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])
    ->name('reset.password.post');

// Rotta homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Rotta per il profilo utente
Route::get('/profile', [PublicController::class, 'profile'])->name('profile');

// Cambia lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

// Informazioni su come diventare revisore
Route::get('/diventa-revisore', [RevisorController::class, 'info'])->name('revisore.info');

// Rotte per Google login
Route::get('auth/google/login', [GoogleController::class, 'login'])->name('auth.google');
Route::get('login/google/callback', [GoogleController::class, 'callback']);

// Rotte per articoli pubblici
Route::prefix('articles')->group(function () {
    Route::get('/index', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
    Route::get('/search', [ArticleController::class, 'searchArticle'])->name('article.search');
});

// Rotte protette per utenti autenticati
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Modifica password
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('password.edit');
    Route::middleware([ThrottlePasswordAttempts::class])->put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Eliminazione account
    Route::post('/profile/delete', [ProfileController::class, 'deleteAccount'])->name('profile.delete');

    // Rotta per creare un articolo
    Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
});

// Rotte per il revisore
Route::prefix('revisor')->middleware('isRevisor')->group(function () {
    Route::get('/index', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
    Route::post('/cancel', [RevisorController::class, 'cancelLastAction'])->name('cancel.lastAction');
});

// Richieste per diventare revisore
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
Route::patch('/make/revisor/{revisoreRequest}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/revisor/reject/{user}', [RevisorController::class, 'rejectRevisor'])->name('reject.revisor');
Route::post('/richiesta-revisore', [RevisorController::class, 'richiedi'])->name('revisore.richiesta');
