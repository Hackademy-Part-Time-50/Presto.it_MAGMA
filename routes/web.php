<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('reset-password/{token}', [PasswordResetLinkController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [PasswordResetLinkController::class, 'reset'])->name('password.update');


Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::middleware(['auth'])->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
});

Route::get('/articles/index',[ArticleController::class, 'index'])->name('articles.index');
Route::get('/show/article/{article}',[ArticleController::class, 'show'])->name('articles.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

//revisore
Route::get('/revisor/index',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//logica di accettazione articolo
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');

//logica di rifiuto articolo
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');

