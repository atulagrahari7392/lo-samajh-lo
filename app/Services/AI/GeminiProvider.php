<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Google Gemini AI Provider
 *
 * Modular implementation of AIProviderInterface using Google Gemini API.
 * Can be swapped in by setting AI_PROVIDER=gemini in .env
 */
class GeminiProvider implements AIProviderInterface
{
    private string $apiKey;
    private string $model;
    private string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta';

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key', '');
        $this->model  = config('lsl.ai.gemini_model', 'gemini-1.5-pro');
    }

    /** {@inheritdoc} */
    public function chat(array $messages, array $options = []): string
    {
        $systemInstruction = $options['system_prompt'] ?? $this->buildSystemPrompt(
            $options['subject'] ?? null,
            $options['language'] ?? 'en'
        );

        // Convert OpenAI-style messages to Gemini format
        $contents = $this->convertMessagesToGeminiFormat($messages);

        $payload = [
            'system_instruction' => ['parts' => [['text' => $systemInstruction]]],
            'contents'           => $contents,
            'generationConfig'   => [
                'temperature'     => $options['temperature'] ?? 0.7,
                'maxOutputTokens' => $options['max_tokens'] ?? 2048,
            ],
        ];

        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->timeout(30)
                ->post("{$this->baseUrl}/models/{$this->model}:generateContent?key={$this->apiKey}", $payload);

            if ($response->failed()) {
                throw new \RuntimeException('Gemini API error: ' . $response->body());
            }

            $data = $response->json();
            return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
        } catch (\Exception $e) {
            Log::error('Gemini chat error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Gemini AI service error: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function solveDoubt(string $question, ?string $imageUrl = null, string $language = 'en'): array
    {
        $langInstruction = $language === 'hi' ? 'Respond in Hindi.' : 'Respond in English.';

        $parts = [['text' => "Solve this problem step by step. {$langInstruction}\n\nQuestion: {$question}\n\nReturn JSON with keys: solution, steps (array), concepts (array)"]];

        if ($imageUrl) {
            // Support inline base64 images
            if (str_starts_with($imageUrl, 'data:')) {
                [$mimeData, $base64Data] = explode(',', $imageUrl, 2);
                $mimeType = str_replace(['data:', ';base64'], '', $mimeData);
                $parts[] = ['inline_data' => ['mime_type' => $mimeType, 'data' => $base64Data]];
            } else {
                $parts[] = ['file_data' => ['file_uri' => $imageUrl]];
            }
        }

        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->timeout(30)
                ->post("{$this->baseUrl}/models/{$this->model}:generateContent?key={$this->apiKey}", [
                    'contents'         => [['role' => 'user', 'parts' => $parts]],
                    'generationConfig' => ['responseMimeType' => 'application/json', 'maxOutputTokens' => 2000],
                ]);

            $content = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
            $decoded = json_decode($content, true);

            return [
                'solution' => $decoded['solution'] ?? $content,
                'steps'    => $decoded['steps'] ?? [],
                'concepts' => $decoded['concepts'] ?? [],
            ];
        } catch (\Exception $e) {
            Log::error('Gemini solveDoubt error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Gemini doubt solving failed: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function generateStudyPlan(array $params): array
    {
        $prompt = "Create a personalized study plan for: Exam={$params['exam_target']}, Exam Date={$params['exam_date']}, Daily Hours={$params['daily_hours']}, Level={$params['current_level']}. Return as JSON with weekly_schedule, milestones, revision_strategy.";

        return $this->generateJSON($prompt, 3000);
    }

    /** {@inheritdoc} */
    public function analyzePerformance(array $performanceData): array
    {
        $prompt = "Analyze this student performance: " . json_encode($performanceData) . ". Return JSON with weak_topics, strong_topics, recommendations, predicted_score, improvement_areas.";

        return $this->generateJSON($prompt, 2000);
    }

    /** {@inheritdoc} */
    public function generateQuiz(string $topic, int $count = 10, string $difficulty = 'medium', string $language = 'en'): array
    {
        $langInstruction = $language === 'hi' ? 'Generate in Hindi.' : 'Generate in English.';
        $prompt = "Generate {$count} {$difficulty} MCQ questions on '{$topic}'. {$langInstruction} Return JSON array with: question_text, options (4 items), correct_option (A/B/C/D), explanation.";

        $data = $this->generateJSON($prompt, 4000);
        return $data['questions'] ?? $data ?? [];
    }

    /** {@inheritdoc} */
    public function explainQuestion(string $questionText, string $correctAnswer, string $language = 'en'): string
    {
        $langInstruction = $language === 'hi' ? 'Explain in Hindi.' : 'Explain in English.';
        $prompt = "Question: {$questionText}\nCorrect Answer: {$correctAnswer}\n\n{$langInstruction} Explain why this is correct.";

        return $this->generateText($prompt, 1000);
    }

    /** {@inheritdoc} */
    public function generateNotes(string $topic, string $subject, string $language = 'en'): string
    {
        $langInstruction = $language === 'hi' ? 'Write in Hindi.' : 'Write in English.';
        $prompt = "Create comprehensive study notes for Topic='{$topic}', Subject='{$subject}'. {$langInstruction} Format in Markdown with headings, key points, formulas, and memory tricks.";

        return $this->generateText($prompt, 3000);
    }

    /** {@inheritdoc} */
    public function getProviderName(): string
    {
        return 'gemini';
    }

    /**
     * Helper: Generate a JSON response from Gemini.
     */
    private function generateJSON(string $prompt, int $maxTokens = 2000): array
    {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->timeout(30)
                ->post("{$this->baseUrl}/models/{$this->model}:generateContent?key={$this->apiKey}", [
                    'contents'         => [['role' => 'user', 'parts' => [['text' => $prompt]]]],
                    'generationConfig' => [
                        'responseMimeType' => 'application/json',
                        'maxOutputTokens'  => $maxTokens,
                        'temperature'      => 0.5,
                    ],
                ]);

            $content = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
            return json_decode($content, true) ?? [];
        } catch (\Exception $e) {
            Log::error('Gemini JSON generation error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Gemini generation failed: ' . $e->getMessage());
        }
    }

    /**
     * Helper: Generate plain text from Gemini.
     */
    private function generateText(string $prompt, int $maxTokens = 2000): string
    {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->timeout(30)
                ->post("{$this->baseUrl}/models/{$this->model}:generateContent?key={$this->apiKey}", [
                    'contents'         => [['role' => 'user', 'parts' => [['text' => $prompt]]]],
                    'generationConfig' => ['maxOutputTokens' => $maxTokens, 'temperature' => 0.5],
                ]);

            return $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? '';
        } catch (\Exception $e) {
            Log::error('Gemini text generation error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Gemini generation failed: ' . $e->getMessage());
        }
    }

    /**
     * Convert OpenAI-format messages to Gemini format.
     */
    private function convertMessagesToGeminiFormat(array $messages): array
    {
        return array_map(fn ($m) => [
            'role'  => $m['role'] === 'assistant' ? 'model' : 'user',
            'parts' => [['text' => $m['content']]],
        ], $messages);
    }

    /**
     * Build system prompt identical to OpenAI provider.
     */
    private function buildSystemPrompt(?string $subject, string $language): string
    {
        $langInstruction = $language === 'hi'
            ? 'Always respond in Hindi (Devanagari script).'
            : 'Respond in clear English.';

        $subjectContext = $subject ? "Currently helping with: {$subject}." : '';

        return "You are 'Samajh', an expert AI tutor for Indian students. {$subjectContext} {$langInstruction} Be clear, accurate, and encouraging.";
    }
}
