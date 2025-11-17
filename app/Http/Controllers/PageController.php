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
        $posts = Post::orderBy('created_at', 'desc')
            ->get()
            ->map(function (Post $post) {
                return [
                    'title'    => $post->title,
                    'slug'     => $post->slug,
                    'excerpt'  => $post->excerpt,
                    'imageUrl' => $post->image_path
                        ? asset('storage/' . $post->image_path)
                        : null,
                    'tags'     => $post->tags
                        ? collect(explode(',', $post->tags))
                            ->map(fn ($t) => trim($t))
                            ->filter()
                            ->values()
                            ->all()
                        : [],
                ];
            });

        return view('pages.gallery', [
            'posts' => $posts,
        ]);
    }
}
