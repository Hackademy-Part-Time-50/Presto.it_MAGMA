<?php
use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
});
