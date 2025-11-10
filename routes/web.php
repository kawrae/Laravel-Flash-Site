<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('post.show');