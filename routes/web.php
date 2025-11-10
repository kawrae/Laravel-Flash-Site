<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('gallery', [
        'posts' => Post::all(),
    ]);
});

Route::get('/posts/{slug}', function (string $slug) {
    $data = Post::find($slug);
    return view('post', $data);
})->name('post.show');