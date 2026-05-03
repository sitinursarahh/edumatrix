<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use App\Models\Quiz;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'quiz_id',
        'question_text'
    ];

    public function options()
    {
        return $this->hasMany(Option::class, 'question_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    // 🔥 supaya option ikut terhapus otomatis
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($question) {
            $question->options()->delete();
        });
    }
}