<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $imageUrl = $post->image_path
            ? asset('storage/' . $post->image_path)
            : null;

        $tags = $post->tags
            ? collect(explode(',', $post->tags))
                ->map(fn ($t) => trim($t))
                ->filter()
                ->values()
                ->all()
            : [];

        return view('post', [
            'post'     => $post,
            'imageUrl' => $imageUrl,
            'tags'     => $tags,
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'slug'     => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
            'category' => ['nullable', 'string', 'max:255'],
            'tags'     => ['nullable', 'string', 'max:255'],
            'excerpt'  => ['nullable', 'string'],
            'body'     => ['nullable', 'string'],
            'image'    => ['nullable', 'image', 'max:4096'],
        ]);

        $slug = $validated['slug'] ?: Str::slug($validated['title']);

        $originalSlug = $slug;
        $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create([
            'title'        => $validated['title'],
            'slug'         => $slug,
            'category'     => $validated['category'] ?? null,
            'excerpt'      => $validated['excerpt'] ?? null,
            'body'         => $validated['body'] ?? null,
            'tags'         => $validated['tags'] ?? null,
            'image_path'   => $imagePath,
            'is_published' => true,
        ]);

        return redirect()
            ->route('post.show', $post->slug)
            ->with('status', 'Post created successfully.');
    }
}
