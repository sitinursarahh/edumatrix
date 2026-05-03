<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRead extends Model
{
    protected $fillable = [
        'user_id',
        'class_id',
        'last_seen_at'
    ];
}
