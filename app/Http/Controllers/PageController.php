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

    /** Gallery page */
    public function gallery()
    {
        return view('gallery', ['posts' => Post::all()]);
    }
}
