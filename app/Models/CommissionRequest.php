<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'instagram',
        'budget',
        'placement',
        'size',
        'preferred_dates',
        'description',
        'image_paths',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'image_paths' => 'array',
    ];
}
