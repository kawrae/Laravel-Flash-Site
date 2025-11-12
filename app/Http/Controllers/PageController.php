<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function gallery()
    {
        return view('pages.gallery', ['posts' => Post::all()]);
    }
}
