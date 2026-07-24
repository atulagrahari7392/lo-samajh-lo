<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AiTutorController extends Controller
{
    public function index()
    {
        return view('student.ai.tutor');
    }

    public function ask(Request $request)
    {
        $request->validate(['question' => 'required|string|max:1000']);

        try {
            $response = OpenAI::chat()->create([
                'model'    => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are Samajh AI, a bilingual educational assistant for Indian students. Answer clearly in the same language as the question (Hindi or English). Format answers with bullet points where helpful. Focus on exam preparation for UGC NET, SSC, Banking, UPSC, and university exams.'],
                    ['role' => 'user', 'content' => $request->question],
                ],
                'max_tokens' => 800,
            ]);
            $answer = $response->choices[0]->message->content;
        } catch (\Exception $e) {
            $answer = "🤖 AI Tutor उत्तर: यह प्रश्न बहुत अच्छा है!\n\nआपके प्रश्न का उत्तर:\n• API key configure करने के बाद AI instant answers देगा\n• अभी demo mode में है\n• OpenAI API key .env में OPENAI_API_KEY के रूप में add करें";
        }

        return response()->json(['answer' => $answer, 'question' => $request->question]);
    }
}
