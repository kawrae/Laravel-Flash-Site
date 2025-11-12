<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionRequest extends Model
{
    protected $fillable = [
        'name','email','instagram','budget','placement','size',
        'preferred_dates','description','image_paths',
    ];
}
