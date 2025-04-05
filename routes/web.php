<?php

use App\Http\Controllers\{PublicController, ArticleController, RevisorController};
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Auth\GoogleController;

// Rotte per il reset della password
Route::controller(PasswordResetLinkController::class)->group(function () {
    Route::get('forgot-password', 'create')->name('password.request');
    Route::post('forgot-password', 'store')->name('password.email');
    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset-password', 'reset')->name('password.update');
});

// Rotta homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Rotte protette per gli utenti autenticati
Route::middleware(['auth'])->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');

    // Rotte per il revisore
    Route::prefix('revisor')->middleware('isRevisor')->group(function () {
        Route::get('/index', [RevisorController::class, 'index'])->name('revisor.index');
        Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
        Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
        Route::post('/cancel', [RevisorController::class, 'cancelLastAction'])->name('cancel.lastAction');
    });

    // Richiesta per diventare revisore
    Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
    Route::patch('/make/revisor/{revisoreRequest}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
    Route::get('/revisor/reject/{user}', [RevisorController::class, 'rejectRevisor'])->name('reject.revisor');

    Route::post('/richiesta-revisore', [RevisorController::class, 'richiedi'])->name('revisore.richiesta');
});

// Rotte pubbliche per articoli
Route::prefix('articles')->group(function () {
    Route::get('/index', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
    Route::get('/search', [ArticleController::class, 'searchArticle'])->name('article.search');
});

// Rotta per cambiare la lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

// Informazioni su come diventare revisore
Route::get('/diventa-revisore', [RevisorController::class, 'info'])->name('revisore.info');

// Promozione a revisore da parte di un admin
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');


Route::get('auth/google/login', [GoogleController::class, 'login'])->name('auth.google');
Route::get('login/google/callback', [GoogleController::class, 'callback']);