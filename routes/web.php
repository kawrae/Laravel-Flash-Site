<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommissionsController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/commissions', [CommissionsController::class, 'create'])->name('commissions.create');
Route::post('/commissions', [CommissionsController::class, 'store'])->name('commissions.store');