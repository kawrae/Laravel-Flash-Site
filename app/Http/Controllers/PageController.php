<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        return view('gallery', ['posts' => Post::all()]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
