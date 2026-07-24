<?php

namespace App\Services\AI;

use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;

class OpenAIProvider implements AIProviderInterface
{
    private string $model;
    private int $maxTokens;

    public function __construct()
    {
        $this->model = config('lsl.ai.openai_model', 'gpt-4o');
        $this->maxTokens = config('lsl.ai.max_tokens', 2048);
    }

    /** {@inheritdoc} */
    public function chat(array $messages, array $options = []): string
    {
        $systemPrompt = $options['system_prompt'] ?? $this->buildSystemPrompt(
            $options['subject'] ?? null,
            $options['language'] ?? 'en'
        );

        $payload = [
            ['role' => 'system', 'content' => $systemPrompt],
            ...$messages,
        ];

        try {
            $response = OpenAI::chat()->create([
                'model'       => $options['model'] ?? $this->model,
                'messages'    => $payload,
                'max_tokens'  => $options['max_tokens'] ?? $this->maxTokens,
                'temperature' => $options['temperature'] ?? 0.7,
            ]);

            return $response->choices[0]->message->content ?? '';
        } catch (\Exception $e) {
            Log::error('OpenAI chat error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('AI service temporarily unavailable: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function solveDoubt(string $question, ?string $imageUrl = null, string $language = 'en'): array
    {
        $langInstruction = $language === 'hi'
            ? 'Please respond in Hindi (Devanagari script).'
            : 'Please respond in English.';

        $contentParts = [
            ['type' => 'text', 'text' => "You are an expert Indian educational tutor. {$langInstruction} Solve this problem step by step:\n\n{$question}"],
        ];

        if ($imageUrl) {
            $contentParts[] = ['type' => 'image_url', 'image_url' => ['url' => $imageUrl]];
        }

        try {
            $response = OpenAI::chat()->create([
                'model'      => 'gpt-4o',
                'messages'   => [['role' => 'user', 'content' => $contentParts]],
                'max_tokens' => 2000,
                'response_format' => ['type' => 'json_object'],
            ]);

            $content = $response->choices[0]->message->content;
            $decoded = json_decode($content, true);

            // Fallback if JSON is not returned
            if (!$decoded) {
                return [
                    'solution' => $content,
                    'steps'    => [],
                    'concepts' => [],
                ];
            }

            return [
                'solution' => $decoded['solution'] ?? $content,
                'steps'    => $decoded['steps'] ?? [],
                'concepts' => $decoded['concepts'] ?? [],
                'formula'  => $decoded['formula'] ?? null,
            ];
        } catch (\Exception $e) {
            Log::error('OpenAI solveDoubt error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('AI doubt solving failed: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function generateStudyPlan(array $params): array
    {
        $prompt = $this->buildStudyPlanPrompt($params);

        try {
            $response = OpenAI::chat()->create([
                'model'           => $this->model,
                'messages'        => [
                    ['role' => 'system', 'content' => 'You are an expert educational coach specializing in Indian competitive exams. Always respond with valid JSON.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens'      => 3000,
                'temperature'     => 0.5,
                'response_format' => ['type' => 'json_object'],
            ]);

            $content = $response->choices[0]->message->content;
            return json_decode($content, true) ?? ['error' => 'Could not generate plan'];
        } catch (\Exception $e) {
            Log::error('OpenAI generateStudyPlan error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Study plan generation failed: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function analyzePerformance(array $performanceData): array
    {
        $prompt = sprintf(
            'Analyze this student performance data for an Indian competitive exam student and provide detailed coaching insights in JSON format.
            
Performance Data:
- Total tests taken: %d
- Average score: %.1f%%
- Subject scores: %s
- Recent 5 test scores: %s
- Average time per question: %d seconds
- Weak topics: %s

Return JSON with keys: weak_topics, strong_topics, recommendations (array of 5 tips), predicted_score (percentage), study_hours_needed, improvement_areas, motivational_message',
            $performanceData['total_tests'] ?? 0,
            $performanceData['avg_score'] ?? 0,
            json_encode($performanceData['subject_scores'] ?? []),
            json_encode($performanceData['recent_scores'] ?? []),
            $performanceData['avg_time_per_question'] ?? 60,
            implode(', ', $performanceData['weak_topics'] ?? [])
        );

        try {
            $response = OpenAI::chat()->create([
                'model'           => $this->model,
                'messages'        => [
                    ['role' => 'system', 'content' => 'You are an AI performance coach for Indian competitive exam students. Respond with valid JSON only.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens'      => 2000,
                'temperature'     => 0.4,
                'response_format' => ['type' => 'json_object'],
            ]);

            $content = $response->choices[0]->message->content;
            return json_decode($content, true) ?? [];
        } catch (\Exception $e) {
            Log::error('OpenAI analyzePerformance error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Performance analysis failed: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function generateQuiz(string $topic, int $count = 10, string $difficulty = 'medium', string $language = 'en'): array
    {
        $langInstruction = $language === 'hi'
            ? 'Generate all questions and options in Hindi (Devanagari script).'
            : ($language === 'both'
                ? 'Provide question text in both English and Hindi.'
                : 'Generate in English.');

        $prompt = "Generate {$count} {$difficulty} difficulty MCQ questions on the topic: '{$topic}'.
{$langInstruction}
Return valid JSON array with each question having:
- question_text (string)
- question_text_hi (string, if bilingual)  
- options (array of 4 strings labeled A, B, C, D)
- options_hi (array of 4 Hindi strings, if bilingual)
- correct_option (A, B, C, or D)
- explanation (string)
- difficulty ({$difficulty})";

        try {
            $response = OpenAI::chat()->create([
                'model'           => $this->model,
                'messages'        => [
                    ['role' => 'system', 'content' => 'You are an expert question setter for Indian educational exams. Return valid JSON only.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens'      => 4000,
                'temperature'     => 0.6,
                'response_format' => ['type' => 'json_object'],
            ]);

            $content = $response->choices[0]->message->content;
            $data = json_decode($content, true);

            return $data['questions'] ?? $data ?? [];
        } catch (\Exception $e) {
            Log::error('OpenAI generateQuiz error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Quiz generation failed: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function explainQuestion(string $questionText, string $correctAnswer, string $language = 'en'): string
    {
        $langInstruction = $language === 'hi'
            ? 'Explain in Hindi (Devanagari script).'
            : 'Explain in clear English.';

        $prompt = "Question: {$questionText}\nCorrect Answer: {$correctAnswer}\n\n{$langInstruction} Provide a clear, detailed explanation of why this answer is correct, including any relevant formulas, concepts, or tricks that would help a student remember this.";

        try {
            $response = OpenAI::chat()->create([
                'model'       => $this->model,
                'messages'    => [
                    ['role' => 'system', 'content' => 'You are a helpful teacher for Indian competitive exams.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens'  => 1000,
                'temperature' => 0.5,
            ]);

            return $response->choices[0]->message->content ?? '';
        } catch (\Exception $e) {
            Log::error('OpenAI explainQuestion error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Question explanation failed: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function generateNotes(string $topic, string $subject, string $language = 'en'): string
    {
        $langInstruction = $language === 'hi'
            ? 'Write comprehensive study notes in Hindi.'
            : 'Write comprehensive study notes in English.';

        $prompt = "Create detailed study notes for: Topic = '{$topic}', Subject = '{$subject}'.
{$langInstruction}
Format the notes in Markdown with:
- Clear headings (H2, H3)
- Key definitions
- Important points as bullet lists
- Formulas in code blocks
- Memory tricks where applicable
- Practice question suggestions at the end";

        try {
            $response = OpenAI::chat()->create([
                'model'       => $this->model,
                'messages'    => [
                    ['role' => 'system', 'content' => 'You are an expert educational content creator for Indian competitive exams and university courses.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens'  => 3000,
                'temperature' => 0.5,
            ]);

            return $response->choices[0]->message->content ?? '';
        } catch (\Exception $e) {
            Log::error('OpenAI generateNotes error', ['error' => $e->getMessage()]);
            throw new \RuntimeException('Notes generation failed: ' . $e->getMessage());
        }
    }

    /** {@inheritdoc} */
    public function getProviderName(): string
    {
        return 'openai';
    }

    /**
     * Build a system prompt for the AI tutor.
     */
    private function buildSystemPrompt(?string $subject, string $language): string
    {
        $langInstruction = $language === 'hi'
            ? 'Always respond in Hindi (Devanagari script) unless the user writes in English.'
            : 'Respond in clear, simple English. Use Hindi transliterations where helpful.';

        $subjectContext = $subject ? "You are currently helping with: {$subject}." : '';

        return "You are 'Samajh', an expert AI tutor for Indian students preparing for competitive exams (UGC NET, SSC, Banking, UPSC, Teaching exams) and university courses (BA, B.Sc, B.Com, MA, M.Sc). {$subjectContext}

{$langInstruction}

Guidelines:
- Give clear, concise, accurate answers
- Break down complex topics step by step
- Use examples relevant to Indian context
- Reference NCERT/standard textbooks when applicable
- If asked for practice questions, provide 3-5 with answers
- Always be encouraging and motivational
- For mathematical problems, show all working steps
- For current affairs, acknowledge your knowledge cutoff date";
    }

    /**
     * Build the study plan generation prompt.
     */
    private function buildStudyPlanPrompt(array $params): string
    {
        $examDate = $params['exam_date'] ?? 'in 6 months';
        $dailyHours = $params['daily_hours'] ?? 4;
        $examTarget = $params['exam_target'] ?? 'General Competition';
        $currentLevel = $params['current_level'] ?? 'intermediate';
        $weakSubjects = implode(', ', $params['weak_subjects'] ?? []);

        return "Create a comprehensive, personalized study plan for:
- Target Exam: {$examTarget}
- Exam Date: {$examDate}
- Daily Study Hours Available: {$dailyHours} hours
- Current Level: {$currentLevel}
- Weak Subjects: {$weakSubjects}

Return a JSON study plan with:
{
  'overview': 'Brief plan summary',
  'total_days': number,
  'weekly_schedule': [
    {
      'week': 1,
      'theme': 'Foundation Building',
      'daily_plan': {
        'monday': ['Subject: Topic (X hours)', ...],
        'tuesday': [...],
        ...
      },
      'milestones': ['...']
    }
  ],
  'revision_strategy': '...',
  'mock_test_schedule': [...],
  'important_topics': {'subject': ['topic1', 'topic2'], ...},
  'recommended_books': ['...'],
  'daily_routine': {
    'morning': '...',
    'afternoon': '...',
    'evening': '...'
  }
}";
    }
}
