<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Facades\DB;

class KelolaSoalController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();

        $kkm = DB::table('setting_kkm')
                ->where('key','kkm')
                ->value('value') ?? 70;

        return view('kelola_soal', compact('quizzes','kkm'));
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions.options');
        return view('isi_kelola_soal', compact('quiz'));
    }
}