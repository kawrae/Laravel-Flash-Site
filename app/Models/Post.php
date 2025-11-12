<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public static function all(): array
    {
        $files = File::files(resource_path('posts'));

        usort($files, fn($a, $b) => $b->getMTime() <=> $a->getMTime());

        return array_map(function ($file) {
            $slug = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $html = File::get($file->getRealPath());

            $title   = self::extractFirst($html, '/<h1[^>]*>(.*?)<\/h1>/i') ?: Str::headline($slug);
            $excerpt = self::extractFirst($html, '/<p[^>]*>(.*?)<\/p>/i') ?:
                       '—';

            return [
                'slug'     => $slug,
                'title'    => strip_tags($title),
                'excerpt'  => strip_tags($excerpt),
                'imageUrl' => self::resolveImageUrl($slug),
            ];
        }, $files);
    }

    public static function find(string $slug): array
    {
        $path = resource_path("posts/{$slug}.html");

        if (! file_exists($path)) {
            throw new ModelNotFoundException("Post [{$slug}] not found.");
        }

        return Cache::remember("posts.v2.{$slug}", 1200, function () use ($path, $slug) {
            $post     = file_get_contents($path);
            $imageUrl = self::resolveImageUrl($slug);
            $title    = self::extractFirst($post, '/<h1[^>]*>(.*?)<\/h1>/i') ?? Str::headline($slug);

            return compact('post', 'imageUrl', 'slug', 'title');
        });
    }

    protected static function resolveImageUrl(string $slug): ?string
    {
        foreach (['webp', 'jpg', 'jpeg', 'png', 'gif'] as $ext) {
            $candidate = public_path("images/posts/{$slug}.{$ext}");
            if (file_exists($candidate)) {
                return "/images/posts/{$slug}.{$ext}";
            }
        }
        return null;
    }

    protected static function extractFirst(string $html, string $pattern): ?string
    {
        if (preg_match($pattern, $html, $m)) {
            return $m[1] ?? null;
        }
        return null;
    }
}
