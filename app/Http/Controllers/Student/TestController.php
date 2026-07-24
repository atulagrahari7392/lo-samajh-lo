<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\TestAttempt;
use App\Models\AttemptAnswer;
use App\Models\Question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $attempts = TestAttempt::where('user_id', auth()->id())->with('test')->latest()->paginate(10);
        return view('student.tests.index', compact('attempts'));
    }

    public function start($testId)
    {
        $test = Test::findOrFail($testId);
        // Create new attempt
        $attempt = TestAttempt::create([
            'user_id'    => auth()->id(),
            'test_id'    => $test->id,
            'started_at' => now(),
            'status'     => 'in_progress',
        ]);
        return redirect()->route('student.tests.attempt', [$test->id, $attempt->id]);
    }

    public function attempt($testId, $attemptId)
    {
        $test    = Test::with('questions.options', 'sections')->findOrFail($testId);
        $attempt = TestAttempt::where('id', $attemptId)->where('user_id', auth()->id())->firstOrFail();
        $answers = AttemptAnswer::where('attempt_id', $attempt->id)->get()->keyBy('question_id');
        return view('student.tests.attempt', compact('test', 'attempt', 'answers'));
    }

    public function submit(Request $request, $testId)
    {
        $test    = Test::with('questions.options')->findOrFail($testId);
        $attempt = TestAttempt::where('test_id', $testId)->where('user_id', auth()->id())->where('status', 'in_progress')->latest()->firstOrFail();

        $totalCorrect = 0; $totalWrong = 0; $score = 0;

        foreach ($request->answers ?? [] as $questionId => $selectedOptions) {
            $question = $test->questions->find($questionId);
            if (!$question) continue;

            $correctOptionIds = $question->options->where('is_correct', true)->pluck('id')->toArray();
            $selected         = (array) $selectedOptions;
            $isCorrect        = !array_diff($correctOptionIds, $selected) && !array_diff($selected, $correctOptionIds);

            AttemptAnswer::updateOrCreate(
                ['attempt_id' => $attempt->id, 'question_id' => $questionId],
                ['selected_options' => json_encode($selected), 'is_correct' => $isCorrect, 'time_spent_seconds' => $request->time_spent[$questionId] ?? 0]
            );

            if ($isCorrect) { $totalCorrect++; $score += $question->marks; }
            else             { $totalWrong++;   $score -= ($question->negative_marks ?? 0); }
        }

        $totalQ    = $test->total_questions;
        $attempted = $totalCorrect + $totalWrong;
        $percent   = $test->total_marks > 0 ? round(($score / $test->total_marks) * 100, 1) : 0;

        $attempt->update([
            'submitted_at'      => now(),
            'status'            => 'submitted',
            'total_attempted'   => $attempted,
            'total_correct'     => $totalCorrect,
            'total_wrong'       => $totalWrong,
            'total_unattempted' => $totalQ - $attempted,
            'score'             => $score,
            'percentage'        => $percent,
            'time_taken_seconds'=> $request->time_taken ?? 0,
        ]);

        return redirect()->route('student.tests.result', [$testId, $attempt->id]);
    }

    public function result($testId, $attemptId)
    {
        $test    = Test::with('questions.options')->findOrFail($testId);
        $attempt = TestAttempt::where('id', $attemptId)->where('user_id', auth()->id())->firstOrFail();
        $answers = AttemptAnswer::where('attempt_id', $attempt->id)->get()->keyBy('question_id');
        return view('student.tests.result', compact('test', 'attempt', 'answers'));
    }

    public function history()
    {
        $attempts = TestAttempt::where('user_id', auth()->id())->with('test')->where('status', 'submitted')->latest()->paginate(15);
        return view('student.tests.history', compact('attempts'));
    }
}
