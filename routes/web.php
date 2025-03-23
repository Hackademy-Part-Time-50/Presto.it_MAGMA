<?php
use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::middleware(['auth'])->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
});

Route::get('/articles/index',[ArticleController::class, 'index'])->name('articles.index');
Route::get('/show/article/{article}',[ArticleController::class, 'show'])->name('articles.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
Route::get('/revisor/index',[RevisorController::class, 'index'])->name('revisor.index');


