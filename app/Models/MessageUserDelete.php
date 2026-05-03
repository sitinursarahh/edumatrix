<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageUserDelete extends Model
{
    protected $fillable = [
        'message_id',
        'user_id',
    ];

    // relasi ke message
    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}