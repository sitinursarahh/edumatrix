<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'materi',
        'last_slide'
    ];
}
