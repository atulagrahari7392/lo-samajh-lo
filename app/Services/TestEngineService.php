<?php

namespace App\Services;

use App\Models\TestAttempt;
use App\Models\Test;
use App\Models\AttemptAnswer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestEngineService
{
    /**
     * Start a new test attempt for a user.
     */
    public function startAttempt(Test $test, int $userId): TestAttempt
    {
        return DB::transaction(function () use ($test, $userId) {
            // Check if user already has an active attempt
            $activeAttempt = TestAttempt::where('user_id', $userId)
                ->where('test_id', $test->id)
                ->where('status', 'in_progress')
                ->first();

            if ($activeAttempt) {
                return $activeAttempt;
            }

            // Create new attempt
            return TestAttempt::create([
                'user_id' => $userId,
                'test_id' => $test->id,
                'started_at' => now(),
                'status' => 'in_progress',
                'ip_address' => request()->ip(),
            ]);
        });
    }

    /**
     * Submit and evaluate a test attempt.
     */
    public function submitAttempt(TestAttempt $attempt, array $answers): TestAttempt
    {
        return DB::transaction(function () use ($attempt, $answers) {
            if ($attempt->status !== 'in_progress') {
                return $attempt; // Already submitted
            }

            $test = $attempt->test;
            $questions = $test->questions()->with('options')->get()->keyBy('id');
            
            $totalCorrect = 0;
            $totalWrong = 0;
            $totalUnattempted = $test->total_questions;
            $score = 0;

            foreach ($answers as $answerData) {
                $question = $questions->get($answerData['question_id']);
                if (!$question) continue;

                $totalUnattempted--;
                $isCorrect = false;
                
                // Evaluate based on question type
                if ($question->type === 'single') {
                    $correctOption = $question->options->where('is_correct', true)->first();
                    $isCorrect = $correctOption && in_array($correctOption->id, $answerData['selected_options'] ?? []);
                } elseif ($question->type === 'multiple') {
                    $correctOptions = $question->options->where('is_correct', true)->pluck('id')->toArray();
                    $selectedOptions = $answerData['selected_options'] ?? [];
                    sort($correctOptions);
                    sort($selectedOptions);
                    $isCorrect = ($correctOptions === $selectedOptions);
                } elseif ($question->type === 'numerical') {
                    $isCorrect = ($question->explanation == $answerData['numerical_answer']); // Simplified check
                }

                if ($isCorrect) {
                    $totalCorrect++;
                    $score += $question->marks;
                } else {
                    $totalWrong++;
                    if ($test->negative_marking) {
                        $score -= ($question->negative_marks ?? $test->negative_marks_value);
                    }
                }

                // Save answer record
                AttemptAnswer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'selected_options' => $answerData['selected_options'] ?? null,
                    'numerical_answer' => $answerData['numerical_answer'] ?? null,
                    'is_correct' => $isCorrect,
                    'time_spent_seconds' => $answerData['time_spent_seconds'] ?? 0,
                    'is_marked_review' => $answerData['is_marked_review'] ?? false,
                ]);
            }

            $percentage = $test->total_marks > 0 ? ($score / $test->total_marks) * 100 : 0;
            $timeTaken = Carbon::parse($attempt->started_at)->diffInSeconds(now());

            $attempt->update([
                'status' => 'submitted',
                'submitted_at' => now(),
                'total_attempted' => $test->total_questions - $totalUnattempted,
                'total_correct' => $totalCorrect,
                'total_wrong' => $totalWrong,
                'total_unattempted' => $totalUnattempted,
                'score' => $score,
                'percentage' => round($percentage, 2),
                'time_taken_seconds' => $timeTaken,
            ]);

            // Optional: Dispatch event to calculate rankings and update leaderboards
            // event(new \App\Events\TestCompleted($attempt));

            return $attempt;
        });
    }

    /**
     * Calculate global ranks for a test.
     */
    public function calculateRanks(int $testId): void
    {
        $attempts = TestAttempt::where('test_id', $testId)
            ->where('status', 'submitted')
            ->orderByDesc('score')
            ->orderBy('time_taken_seconds')
            ->get();

        $rank = 1;
        foreach ($attempts as $attempt) {
            $attempt->update(['rank' => $rank]);
            $rank++;
        }
    }
}
