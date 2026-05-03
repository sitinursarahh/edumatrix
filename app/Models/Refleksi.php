<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refleksi extends Model
{
    protected $table = 'refleksi';

    protected $fillable = [
        'user_id',
        'materi_kode',
        'jawaban_1',
        'jawaban_2',
        'jawaban_3',
        'jawaban_4',
        'jawaban_5',
        'jawaban_6'
    ];

    // 🔥 relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}