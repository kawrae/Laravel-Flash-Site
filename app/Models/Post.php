<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'body',
        'tags',
        'image_path',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    public function getTagsArrayAttribute(): array
    {
        if (! $this->tags) {
            return [];
        }

        return collect(explode(',', $this->tags))
            ->map(fn ($t) => trim($t))
            ->filter()
            ->values()
            ->all();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image_path
            ? asset('storage/' . $this->image_path)
            : null;
    }
}
