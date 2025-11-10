<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(string $slug)
    {
        $data = Post::find($slug);
        return view('post', $data);
    }
}
