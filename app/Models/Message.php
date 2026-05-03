<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    protected $fillable = [
    'class_id',
    'user_id',
    'message',
    'file_path',
    'file_name',
];
    public function user()
{
    return $this->belongsTo(User::class)->withDefault([
        'name' => 'User dihapus',
        'profile_photo_path' => null,
    ]);
}

    public function deletedByUsers()
{
    return $this->hasMany(MessageUserDelete::class);
}
}