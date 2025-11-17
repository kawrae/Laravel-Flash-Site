<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommissionsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/commissions', [CommissionsController::class, 'create'])->name('commissions.create');
Route::post('/commissions', [CommissionsController::class, 'store'])->name('commissions.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'can:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/posts/create', [PostController::class, 'create'])
            ->name('posts.create');

        Route::post('/posts', [PostController::class, 'store'])
            ->name('posts.store');
    });
