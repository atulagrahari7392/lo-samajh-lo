<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AI\AIService;

class AIController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function solveDoubt(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
            'context' => 'nullable|string'
        ]);

        $answer = $this->aiService->solveDoubt($request->question, $request->context);

        return response()->json([
            'success' => true,
            'answer' => $answer
        ]);
    }

    public function generateQuiz(Request $request)
    {
        $request->validate([
            'topic' => 'required|string',
            'count' => 'nullable|integer|min:1|max:10'
        ]);

        $quiz = $this->aiService->generateQuiz($request->topic, $request->count ?? 5);

        return response()->json([
            'success' => true,
            'quiz' => $quiz
        ]);
    }
}
