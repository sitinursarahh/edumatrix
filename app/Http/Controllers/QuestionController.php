<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Quiz $quiz)
    {
        return view('questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
{
    $question = Question::create([
        'quiz_id' => $quiz->id,
        'question_text' => $request->question_text,
    ]);

    foreach ($request->options as $index => $optionText) {
        Option::create([
    'question_id' => $question->id,
    'option_text' => $this->wrapMathJax($optionText),
    'is_correct' => $request->correct_option == $index
]);
    }

    return redirect()
        ->route('questions.create', $quiz->id)
        ->with('success', 'Soal berhasil ditambahkan!');
}

    public function edit(Question $question)
{
    $quiz = $question->quiz; // ambil quiz dari relasi
    $question_clean = $this->cleanDisplayText($question->question_text);

$options_clean = [];
foreach ($question->options as $opt) {
    $options_clean[] = $this->cleanDisplayText($opt->option_text);
}

return view('questions.edit', compact(
    'question',
    'quiz',
    'question_clean',
    'options_clean'
));
}

private function wrapMathJax($text)
{
    // kalau sudah ada MathJax, jangan diubah
    if (str_contains($text, '\\(') || str_contains($text, '\\[')) {
        return $text;
    }

    // ================== HANDLE MATRIX ==================
    if (preg_match('/\[(.*?)\]/s', $text, $match)) {

        $matrixRaw = $match[1];

        // convert matrix
        $matrixLatex = $this->convertToLatexMatrix($matrixRaw);

        // ✅ pakai inline math (kurung biasa)
        $matrixLatex = "\\(" . $matrixLatex . "\\)";

        // ganti hanya bagian matrix saja
        $text = str_replace($match[0], $matrixLatex, $text);
    }

    // ================== HANDLE SUBSCRIPT ==================
    $text = preg_replace_callback(
        '/\b([a-zA-Z])(\d+)\b/',
        function ($m) {
            return '\\(' . $m[1] . '_{' . $m[2] . '}\\)';
        },
        $text
    );

    // ================== HANDLE HURUF BESAR ==================
    $text = preg_replace('/\b([A-Z])\b/', '\\\\($1\\\\)', $text);

    return $text;
}
private function convertToLatexMatrix($text)
{
    $text = trim($text);

    // cek apakah ada baris (enter)
    if (str_contains($text, "\n")) {
        $rows = preg_split('/\n+/', $text);
    } else {
        // kalau 1 baris → auto split
        $numbers = preg_split('/\s+/', $text);
        $count = count($numbers);

        // default: 2 kolom
        $cols = 2;

        // hitung jumlah baris
        $rows = array_chunk($numbers, $cols);
    }

    $latexRows = [];

    foreach ($rows as $row) {

        // kalau dari newline → masih string
        if (is_string($row)) {
            $cols = preg_split('/\s+/', trim($row));
        } else {
            $cols = $row;
        }

        $latexRows[] = implode(' & ', $cols);
    }

    return '\\begin{bmatrix}'
        . "\n" . implode(" \\\\\n", $latexRows) . "\n"
        . '\\end{bmatrix}';
}
    public function update(Request $request, Question $question)
{
    $question->update([
        'question_text' => $this->wrapMathJax($request->question_text)
    ]);

    foreach ($question->options as $i => $option) {
        $option->update([
    'option_text' => $this->wrapMathJax($request->options[$i]),
    'is_correct' => $request->correct_option == $i
]);
    }

    return redirect()
        ->route('questions.edit', $question->id)
        ->with('success', 'Soal berhasil diperbarui!');
}

    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('success', 'Soal berhasil dihapus');
    }

    private function cleanDisplayText($text)
{
    // hapus HTML
    $text = strip_tags($text);

    // hapus wrapper MathJax
    $text = str_replace([
        '\\(', '\\)',
        '\\[', '\\]',
        '$$'
    ], '', $text);

    // ubah matrix sederhana (hapus begin-end saja)
    $text = str_replace([
    '\\begin{bmatrix}',
    '\\end{bmatrix}'
], ['[', ']'], $text);

    // ubah baris matrix
    $text = str_replace('\\\\', "\n", $text);

// rapikan newline
$text = preg_replace('/\n\s+/', "\n", $text);

    // ubah kolom matrix
    $text = str_replace('&', ' ', $text);

    // subscript a_{12} → a12
    $text = preg_replace('/_\{(.*?)\}/', '$1', $text);

    // fraction
    $text = preg_replace('/\\\\frac\{(.*?)\}\{(.*?)\}/', '$1/$2', $text);

    // sqrt
    $text = preg_replace('/\\\\sqrt\{(.*?)\}/', '√$1', $text);

    // hapus sisa command latex
    $text = preg_replace('/\\\\[a-zA-Z]+/', '', $text);

    return trim($text);
}
}
