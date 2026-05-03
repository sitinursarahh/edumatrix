<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'title',
        'description',
        'total_questions'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }
}